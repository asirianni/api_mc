<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class UserRepository
{
    public function store($request,$direccion){
        

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'surname' => $request->get('surname'),
            'id_type' => $request->get('type'),
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
        
        
        $actualizacion["update"]=$user->save();
        $actualizacion["user"]=$user;

        return $actualizacion;
    }
}