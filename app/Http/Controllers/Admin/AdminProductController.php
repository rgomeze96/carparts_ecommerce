<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Interfaces\ImageStorage;

class AdminProductController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);

        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('product.show')->with("data", $data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Product::all();

        return view('admin.product.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        Product::validateProduct($request);
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);

        return back()->with('success', __('product.controller.created'));
    }

    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "List of products";
        $data["products"] = Product::all()->sortByDesc('id');

        return view('admin.product.list')->with("data", $data);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('admin.product.list')->with('success', __('product.controller.removed'));
    }
}
