<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data["products"] = Product::inRandomOrder()->get();
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
