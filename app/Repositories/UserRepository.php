<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class UserRepository
{
    public function store($request,$direccion){
        

        $user = User::create([
            'name' => $request["name"],
            'email' => $request["email"],
            'password' => Hash::make($request["password"]),
            'surname' => $request["surname"],
            'id_type' => $request["type"],
            'address' => $direccion["address"],
            'location' => $direccion["location"],
            'province' => $direccion["province"],
            'country' => $direccion["country"],
        ]);

        return $user;
    }

    public function update($request,$token){
        $user = User::find($token["user"]["id"]);
       
        $user->address = $request["address"];
        $user->location = $request["location"];
        $user->province = $request["province"];
        $user->country = $request["country"];
        $user->id_type = $request["id_type"];
        $user->birth = $request["birth"];
        $user->id_activitie = $request["id_activitie"];
        
        $user->save();

        return $user;
    }

    public function list(){

        $users = User::all();

        return $users;
    }
}