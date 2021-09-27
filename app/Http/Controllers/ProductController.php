<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use App\Models\Review;
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
        $newReview->rating = $request->newReviewRating;
        $newReview->review_text = $request->newReviewText;
        $newReview->product_id = $id;
        $newReview->user_id = Auth::id();
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

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "List of products";
        $data["products"] = Product::all();

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
                $item->setProductId($product->getId());
                $total = $total + $product->getSalePrice();
                $item->setSubtotal($product->getSalePrice());
                $numberItems = $numberItems + 1;
                $item->save();
            }

            $order->setTotal($total);
            $order->setNumberItems($numberItems);
            $order->save();
        }
    }
}
