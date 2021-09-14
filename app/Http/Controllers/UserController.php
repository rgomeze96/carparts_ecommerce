<?php

namespace App\Http\Controllers;
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
        return view('user.show')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Crear user";
        $data["users"] = User::all();

        return view('user.create')->with("data",$data);
    }


    public function save(Request $request)
    {
        User::validateForm($request);
        //User::create($request->only(["name","user","password","email","addres","age","city","country","telephone","balance"]));
        $user=User::latest('id')->first();
        $data=$user->getId();
        return redirect('user/show/'.$data)->with('success','user created successfuly!!');
    }

    public function listar()
    {
        $data = []; //to be sent to the view
        $data["title"] = "users list";
        $data["users"]= User::all()->sortByDesc('id');
        return view('user.list')->with("data",$data);
    }

    public function destroy($id)
    {
        $user= User::findorfail($id);
        $user->delete();
        return redirect('user/list')->with('success','User deleted successfuly');

    }
}
