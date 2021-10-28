<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        $user = User::findOrFail($id);
        $data["title"] = $user->getName();
        $data["user"] = $user;
        return view('user.show')->with("data", $data);
    }

    public function save(Request $request)
    {
        User::validateUser($request);
        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->save();
        return redirect()->route('login')->with('success', __('user.controller.created'));
    }

    public function destroy($id)
    {
        $user= User::findorfail($id);
        $user->delete();
        return redirect('user.list')->with('success', 'User deleted successfuly');
    }
}
