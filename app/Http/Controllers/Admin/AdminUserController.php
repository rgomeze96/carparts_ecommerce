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


}
