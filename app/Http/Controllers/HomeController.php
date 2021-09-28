<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data["products"] = Product::all()->random(6);
        return view('home.index')->with("data", $data);
    }

    public function language(Request $request, $lan)
    {
        if (! in_array($lan, ['en', 'es'])) {
            abort(400);
        }
        
        $request->session()->put('applocale', $lan);
        return redirect()->route('home.index');
    }
}
