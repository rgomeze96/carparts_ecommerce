<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\ToolLoan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function list()
    {
        $data = []; //to be sent to the view

        $data["title"] = "User List";
        $data["users"] = User::all();
        $data["loanedTools"] = ToolLoan::all();

        if (User::where('id', Auth::id())->first()->getRole() == 'admin') {
            return view('admin.user.list')->with("data", $data);
        } else {
            return redirect()->route('home.index')->with('error', __('auth.unauthorized'));
        }
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
