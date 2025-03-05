<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\UserRequest;

class UserController extends ResponseController
{
    public function addUser(UserRequest $request) {

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->phone_number = $request['phone_number'];
        $user->festivals_id = $request['festivals_id'];
        $user->save();

        return $this->sendResponse($user,"Sikeres!");
    }

    // Felhasználók listázása
    public function listUsers()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    // Egyedi felhasználó lekérése
    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }
}
