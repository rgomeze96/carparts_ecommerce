<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::where('id', $id)->with('reviews.user')->first();
        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('product.show')->with("data", $data);
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
    public function review($id)
    {
        $data = []; //to be sent to the view
        $product = Product::where('id', $id)->first();
        $data["title"] = 'Review: '.$product->getName();
        $data["product"] = $product;
        
        return view('product.review')->with("data", $data);
    }

    public function list(Request $request)
    {
        $data = []; //to be sent to the view
        if ($request->has('nameFilter')) {
            $data["title"] =  __('product.controller.listOfProductsWith').
                $request->nameFilter.__('product.controller.inName');
            $nameFilter = $request->nameFilter;
            $request->nameFilter.__('product.controller.inName');
            $data["products"] = Product::where('name', 'like', "%$nameFilter%")->get();
        } elseif ($request->has('categoryFilter')) {
            $data["title"] = "Tools Available for Rent";
            $data["products"] = Product::where('category', $request->categoryFilter)->get();
        } else {
            $data["title"] =  __('product.controller.allProducts');
            $data["products"] = Product::all();
        }
        return view('product.list')->with("data", $data);
    }
    
    public function addToCart(Request $request, $id)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);
        return back();
    }
    
    public function deleteFromCart(Request $request, $id)
    {
        $product = 'products'.'.'.$id;
        $request->session()->forget($product);
        return back();
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

    public function deleteAllCart(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $ids = $request->session()->get("products"); //obtenemos ids de productos guardados en session
        $total = 0;
        $numberItems = 0;
        $user=User::findOrFail(Auth::id());
        if ($ids) {
            $order = new Order();
            $order->setTotal(0);
            $order->setNumberItems(0);
            $order->setUserId(Auth::id());
            $order->save();
            $products = Product::find(array_values($ids));

            foreach ($products as $product) {
                $item = new Item();
                $item->setOrderId($order->getId());
                $item->setProductName($product->getName());
                $total = $total + $product->getSalePrice();
                $item->setSubtotal($product->getSalePrice());
                $numberItems = $numberItems + 1;
                $item->save();
            }
            $userBalance = $user->getBalance();
            $user->setBalance($userBalance-$total);
            $user->save();
            $order->setTotal($total);
            $order->setNumberItems($numberItems);
            $order->save();
            $request->session()->forget('products');
            return redirect()->route('product.showCart')->with('success', __('product.controller.buySuccessful'));
        }
    }
}
