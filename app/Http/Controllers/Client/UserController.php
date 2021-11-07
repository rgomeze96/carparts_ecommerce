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

    public function update(Request $request, $id)
    {
        User::validateUpdateUser($request);
        $userToUpdate = User::findOrFail($id);
        if ($request->name != $userToUpdate->getName()) {
            $userToUpdate->setName($request->name);
        }
        if ($request->email != $userToUpdate->getEmail()) {
            $userToUpdate->setEmail($request->email);
        }
        if ($request->address && $request->address != $userToUpdate->getAddress()) {
            $userToUpdate->setAddress($request->address);
        }
        if ($request->age && $request->age != $userToUpdate->getAge()) {
            $userToUpdate->setAge($request->age);
        }
        if ($request->city && $request->city != $userToUpdate->getCity()) {
            $userToUpdate->setCity($request->city);
        }
        if ($request->country && $request->country != $userToUpdate->getCountry()) {
            $userToUpdate->setCountry($request->country);
        }
        if ($request->telephone && $request->telephone != $userToUpdate->getTelephone()) {
            $userToUpdate->setTelephone($request->telephone);
        }
        $userToUpdate->save();
        return redirect()->route('user.show', $userToUpdate->getId())->with('success', __('user.controller.updated'));
    }

    public function destroy($id)
    {
        $user= User::findorfail($id);
        $user->delete();
        return redirect('user.list')->with('success', 'User deleted successfuly');
    }
}
