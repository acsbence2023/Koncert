<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ResponseController;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class UserController extends ResponseController
{
    /* public function addUser(UserRequest $request) {

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->phone_number = $request['phone_number'];
        $user->festivals_id = $request['festivals_id'];
        $user->admin = $request['admin'];
        $user->save();

        return $this->sendResponse($user,"Sikeres!");
    } */

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


    public function register( UserRegisterRequest $request ) {

        $request->validated();

        $user = User::create([

            "name" => $request["name"],
            "email" => $request["email"],
            "phone_number" => $request["phone_number"],
            "password" => bcrypt( $request["password"]),
            "admin" => 0
        ]);

        if(User::count() == 1) {
            $user->admin = 2;
            $user->save();
        }



        return $this->sendResponse( $user->name, "Sikeres regisztráció");
    }



    public function login(UserLoginRequest $request){
        $request->validated();
        
    }



    public function logout() {

        auth( "sanctum" )->user()->currentAccessToken()->delete();
        $name = auth( "sanctum" )->user()->name;

        return $this->sendResponse( $name, "Sikeres kijelentkezés");
    }
        public function getTokens() {

        $tokens = DB::table( "personal_access_tokens" )->get();

        return $tokens;
    }
}
