<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data["products"] = Product::inRandomOrder()->take(6)->get();
        $data["orders"] = Order::with('items')->get();
        $numberOfTimesItemSold = [];

        foreach ($data["orders"] as $order) {
            foreach ($order['items'] as $item) {
                if (array_key_exists($item->getProductName(), $numberOfTimesItemSold)) {
                    $numberOfTimesItemSold[$item->getProductName()] =
                        $numberOfTimesItemSold[$item->getProductName()] + 1;
                } else {
                    $numberOfTimesItemSold[$item->getProductName()] = 1;
                }
            }
        }
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
