<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Interfaces\ImageStorage;

class AdminUserController extends Controller
{
    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "User List";
        $data["users"] = User::all();

        return view('admin.user.list')->with("data", $data);
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();

        return back()->with('success', __('User.controller.removed'));
    }

   /* public function edit($id)
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
    }*/
}
