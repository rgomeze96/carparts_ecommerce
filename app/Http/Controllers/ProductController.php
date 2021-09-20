<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;

class ProductController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);

        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('product.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "List of products";
        $data["products"] = Product::all()->sortByDesc('id');

        return view('product.list')->with("data",$data);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('product.list')->with('success','Element removed successfully!');
    }
    public function addToCart($id, Request $request)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);
        return back();
    }

    public function showCart(Request $request)
    {
        $data = []; //to be sent to the view
        $ids = $request->session()->get("products"); //obtenemos ids de productos guardados en session
        
        if($ids){
            $data["products"]=Product::find(array_values($ids));
        }
        else{
            $data["products"]=array(); 
        }
        return view('product.showCart')->with("data",$data);
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
        $total=0;
        if($ids){
            $order = new Order();
            $order->setTotal(0);
            $order->save();

            $products = Product::find(array_values($ids));

            foreach ($products as $product){
                $item = new Item();
                $item->setOrderId($order->getId());
                $item->setProductId($product->getId());
                $total = $total + $product->getSalePrice();
                $item->setSubtotal($product->getSalePrice());
                $item->setQuantity(1);
                $item->save();
            }

            $order->setTotal($total);
            $order->save();
        }  
        else{  
           
        }
        
    }

}
