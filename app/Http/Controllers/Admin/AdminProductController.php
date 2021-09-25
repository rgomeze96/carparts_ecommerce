<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Interfaces\ImageStorage;

class AdminProductController extends Controller
{

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create Product";
       
        return view('admin.product.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        Product::validateProduct($request);
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        Product::create($request->only(["name","description","salePrice","cost","category","brand","warranty", "quantity", "image"]));
        return redirect()->route('admin.product.create')->with('success', __('product.controller.created'));
    }

    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "Product List";
        $data["products"] = Product::all();

        return view('admin.product.list')->with("data", $data);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', __('product.controller.removed'));
    }

    public function edit($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);

        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('admin.product.edit')->with("data", $data);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->salePrice = $request->input('salePrice');
        $product->category = $request->input('category');
        $product->brand = $request->input('brand');
        $product->warranty = $request->input('warranty');
        $product->save();

        return view('admin.product.list')->with('success', __('product.controller.created'));
    }
}
