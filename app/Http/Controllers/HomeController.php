<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function home()
    {
        return redirect()->route('home.index');
    }

    public function language(Request $request, $lan)
    {
        if (! in_array($lan, ['en', 'es'])) 
        {
            abort(400);
        }
 
        $request->session()->put('applocale', $lan);
        return redirect()->route('home.index'); 
    }
}
