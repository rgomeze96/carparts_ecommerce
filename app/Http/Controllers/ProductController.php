<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

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

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Product::all();

        return view('product.create')->with("data",$data);
    }

    public function save(Request $request)
    {   
        Product::validateProduct($request);
        //Product::create($request->only(["name","description","price","category","brand","warranty"]));

        $product = Product::latest('id')->first();
        $data = $product->getId();
        return redirect('product/show/'.$data)->with('success','Item created successfully!');
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

        return redirect('product/list')->with('success','Element removed successfully!');
    }
    public function add($id, Request $request)
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

    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

}
