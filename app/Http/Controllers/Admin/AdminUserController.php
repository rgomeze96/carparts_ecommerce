<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Interfaces\ImageStorage;
use App\Models\ToolLoan;

class AdminUserController extends Controller
{
    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "User List";
        $data["users"] = User::all();
        $data["loanedTools"] = ToolLoan::all();

        return view('admin.user.list')->with("data", $data);
    }

    public function update(Request $request, $id)
    {
        $userToModify = User::findOrFail($id);
        $userToModify->setName($request->name);
        $userToModify->setEmail($request->email);
        $userToModify->setAddress($request->address);
        $userToModify->setAge($request->age);
        $userToModify->setCity($request->city);
        $userToModify->setCountry($request->country);
        $userToModify->setTelephone($request->telephone);
        $userToModify->setBalance($request->balance);
        if ($request->role) {
            $userToModify->setRole($request->role);
        }
        $userToModify->save();
        return redirect()->route('admin.user.list')->with('success', __('User.controller.updated'));
    }

    public function destroy($id)
    {
        $userToDelete = User::findOrFail($id);
        $userToDelete->delete();

        return back()->with('success', __('User.controller.removed'));
    }
}
