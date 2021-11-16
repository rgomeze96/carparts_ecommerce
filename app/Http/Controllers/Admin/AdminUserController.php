<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\ToolLoan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function manage()
    {
        $data = []; //to be sent to the view

        $data["title"] = "Manage Users";
        $data["users"] = User::paginate(5);
        $data["loanedTools"] = ToolLoan::all();

        if (User::where('id', Auth::id())->first()->getRole() == 'admin') {
            return view('admin.user.manage')->with("data", $data);
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
        return redirect()->route('admin.user.manage')->with('success', __('User.controller.updated'));
    }

    public function destroy($id)
    {
        $userToDelete = User::findOrFail($id);
        $userToDelete->delete();

        return redirect()->route('admin.user.manage')->with('success', __('User.controller.removed'));
    }
}
