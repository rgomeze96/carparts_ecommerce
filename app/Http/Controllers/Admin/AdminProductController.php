<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Interfaces\ImageStorage;
use App\Models\ToolLoan;

class AdminProductController extends Controller
{

    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "Product List";
        $data["products"] = Product::all();
        $data["loanedTools"] = ToolLoan::all();

        return view('admin.product.list')->with("data", $data);
    }

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
        if ($request->image) {
            $image = $request->image;
            $imagePath = "";
            $imagePath = "/storage/". $request->name .".".$image->getClientOriginalExtension();
        } else {
            $imagePath = "";
        }
        $newProduct = new Product;
        $newProduct->name = $request->name;
        $newProduct->description = $request->description;
        $newProduct->sale_price = $request->salePrice;
        $newProduct->cost = $request->cost;
        $newProduct->category = $request->category;
        $newProduct->brand = $request->brand;
        $newProduct->warranty = $request->warranty;
        $newProduct->quantity = $request->quantity;
        $newProduct->image_path = $imagePath;
        $newProduct->save();
        
        //Product::create($request->only(["name","description","salePrice","cost","category","brand","warranty", "quantity", $imagePath]));
        return redirect()->route('admin.product.create')->with('success', __('product.controller.created'));
    }

    public function update(Request $request, $id)
    {
        
        Product::validateProduct($request);
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        $productToUpdate = Product::findOrFail($id);
        if ($request->image) {
            $image = $request->image;
            $imagePath = "";
            $imagePath = "/storage/". $request->name .".".$image->getClientOriginalExtension();
            $productToUpdate->setImagePath($imagePath);
        }
        $productToUpdate->name = $request->name;
        $productToUpdate->description = $request->description;
        $productToUpdate->sale_price = $request->salePrice;
        $productToUpdate->cost = $request->cost;
        $productToUpdate->category = $request->category;
        $productToUpdate->brand = $request->brand;
        $productToUpdate->warranty = $request->warranty;
        $productToUpdate->quantity = $request->quantity;
        $productToUpdate->save();
        return redirect()->route('admin.product.list')->with('success', __('product.controller.updated'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return back()->with('success', __('product.controller.removed'));
    }  
}
