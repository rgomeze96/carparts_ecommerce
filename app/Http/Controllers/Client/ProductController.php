<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);
        return redirect()->route('product.showCart')->with('success', __('product.controller.addedToCartSuccessfully'));
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $ids = $request->session()->get("products"); //obtenemos ids de productos guardados en session
        $total = 0;
        $numberItems = 0;
        $user=User::findOrFail(Auth::id());
        $getProductsToUpdateQuantity = Product::all();
        if ($ids) {
            $order = new Order();
            $order->setTotal(0);
            $order->setNumberItems(0);
            $order->setUserId(Auth::id());
            $order->save();
            $products = Product::find(array_values($ids));
            foreach ($products as $product) {
                $item = new Item();
                $total = $total + $product->getSalePrice();
                if ($total > $user->getBalance()) {
                    $latestOrder = Order::orderByDesc('created_at')->first();
                    $latestOrder->delete();
                    return redirect()->route('product.showCart')
                        ->with('error', __('product.controller.insufficientBalance'));
                } else {
                    $item->setOrderId($order->getId());
                    $item->setProductName($product->getName());
                    $item->setSubtotal($product->getSalePrice());
                    $numberItems = $numberItems + 1;
                    $productToUpdateQuantity = $getProductsToUpdateQuantity->
                        where('name', $product->getName())->first();
                    $productToUpdateQuantity->setQuantity($productToUpdateQuantity->getQuantity() - 1);
                    $item->save();
                }
            }
            if ($total > $user->getBalance()) {
                $latestOrder = Order::orderByDesc('created_at')->first();
                $latestOrder->delete();
                return redirect()->route('product.showCart')
                    ->with('error', __('product.controller.insufficientBalance'));
            } else {
                $userBalance = $user->getBalance();
                $user->setBalance($userBalance-$total);
                $user->save();
                $order->setTotal($total);
                $order->setNumberItems($numberItems);
                $productToUpdateQuantity->save();
                $order->save();
                $request->session()->forget('products');
            }
            return redirect()->route('product.showCart')->with('success', __('product.controller.buySuccessful'));
        }
    }

    public function deleteAllCart(Request $request)
    {
        $request->session()->forget('products');
        return redirect()->route('product.showCart')
            ->with('success', __('product.controller.deletedAllFromCartSuccessfully'));
    }

    public function deleteFromCart(Request $request, $id)
    {
        $product = 'products'.'.'.$id;
        $request->session()->forget($product);
        return redirect()->route('product.showCart')
            ->with('success', __('product.controller.deleted1FromCartSuccessfully'));
    }

    public function list(Request $request)
    {
        $data = []; //to be sent to the view
        $nameFilter = $request->input('nameFilter');
        $categoryFilter = $request->input('categoryFilter');
        $brandFilter = $request->input('brandFilter');
        
        $products = Product::query();
        $brands = $products->distinct()->get('brand')->sortBy('brand');
        $categories = $products->distinct()->get('category')->sortBy('category');
        $data["title"] = "";
        if (isset($nameFilter)) {
            $products = $products->where('name', 'like', "%$nameFilter%");
            $data["title"] =  __('product.controller.listOfProductsWith').
                $nameFilter.__('product.controller.inName');
        }
        if (isset($categoryFilter)) {
            $products = $products->where('category', $categoryFilter);
            $data["title"] = __('product.controller.listOfProductsByCategory').$categoryFilter;
        }
        if (isset($brandFilter)) {
            $products = $products->where('brand', $brandFilter);
            $data["title"] = __('product.controller.listOfProductsByBrand').$brandFilter;
        }
        if (!isset($nameFilter) && !isset($brandFilter) && !isset($categoryFilter)) {
            $data["title"] =  __('product.controller.allProducts');
        }
        $filterResults = $products->paginate(5);
        $data["products"] = $filterResults;
        $data["brands"] = $brands;
        $data["categories"] = $categories;
        return view('product.list')->with("data", $data);
    }

    public function review($id)
    {
        $data = []; //to be sent to the view
        $product = Product::where('id', $id)->first();
        $data["title"] = 'Review: '.$product->getName();
        $data["product"] = $product;
        
        return view('product.review')->with("data", $data);
    }

    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::where('id', $id)->with('reviews.user')->first();
        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('product.show')->with("data", $data);
    }

    public function showCart(Request $request)
    {
        $data = []; //to be sent to the view
        $ids = $request->session()->get("products"); //obtenemos ids de productos guardados en session
        $data["user"] = User::find(Auth::id());
        if ($ids) {
            $data["products"] = Product::find(array_values($ids));
        } else {
            $data["products"] = array();
        }
        return view('product.showCart')->with("data", $data);
    }

    public function storeReview(Request $request, $id)
    {
        Review::validate($request);
        $newReview = new Review;
        $newReview->setRating($request->newReviewRating);
        $newReview->setReviewText($request->newReviewText);
        $newReview->setProductId($id);
        $newReview->setUserId(Auth::id());
        $newReview->save();
        return redirect()->route('product.show', $id)->with('success', __('product.controller.reviewCreated'));
    }
}
