<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\ToolLoan;
use App\Models\User;

use App\Interfaces\ImageStorage;

class AdminProductController extends Controller
{

    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "Product List";
        $data["products"] = Product::all();
        $data["loanedTools"] = ToolLoan::all();

        if (User::where('id', Auth::id())->first()->getRole() == 'admin') {
            return view('admin.product.list')->with("data", $data);
        } else {
            return redirect()->route('home.index')->with('error', __('auth.unauthorized'));
        }
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create Product";
       
        if (User::where('id', Auth::id())->first()->getRole() == 'admin') {
            return view('admin.product.create')->with("data", $data);
        } else {
            return redirect()->route('home.index')->with('error', __('auth.unauthorized'));
        }
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
        $newProduct->setName($request->name);
        $newProduct->setDescription($request->description);
        $newProduct->setSalePrice($request->salePrice);
        $newProduct->setCost($request->cost);
        $newProduct->setCategory($request->category);
        $newProduct->setBrand($request->brand) ;
        $newProduct->setWarranty($request->warranty) ;
        $newProduct->setQuantity($request->quantity) ;
        $newProduct->setImagePath($imagePath) ;
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
        $productToUpdate->setName($request->name);
        $productToUpdate->setDescription($request->description);
        $productToUpdate->setSalePrice($request->salePrice);
        $productToUpdate->setCost($request->cost);
        $productToUpdate->setCategory($request->category);
        $productToUpdate->setBrand($request->brand) ;
        $productToUpdate->setWarranty($request->warranty);
        $productToUpdate->setQuantity($request->quantity);
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
