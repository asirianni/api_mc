<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class UserController extends Controller
{
    //login
    public function authenticate(Request $request)
    {
      $credentials = $request->only('email', 'password');
      try {
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 400);
          }
      } catch (JWTException $e) {
          return response()->json(['error' => 'could_not_create_token'], 500);
      }
      return response()->json(compact('token'));
    }

    //get user
    public function getAuthenticatedUser()
    {
        $token=\App\Validaciones::validateToken();
        return $token["response"];
    }

    //registro de usuario
    public function register(Request $request)
    {

        Log::info($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'surname' => 'required|string|max:255',
            'type' => 'required|integer',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
        }

        $ip= \App\Api::get_ip();
        $direccion= \App\Api::get_address($ip);

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

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    //update usuario
    public function update(Request $request)
    {
        $datos=$request->all();
        $token=\App\Validaciones::validateToken();
        
        if($token["state"]){

            
            $validator = Validator::make($request->all(), [
                'address' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'province' => 'nullable|string|max:255', 
                'country' => 'nullable|string|max:255',   
                'id_type' => 'nullable|integer', 
                'birth' => 'nullable|date',
                'id_activitie' => 'nullable|integer',  
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            
            $user = User::find($token["user"]["id"]);
            
            
            $user->address = $datos["address"];
            $user->location = $datos["location"];
            $user->province = $datos["province"];
            $user->country = $datos["country"];
            $user->id_type = $datos["id_type"];
            $user->birth = $datos["birth"];
            $user->id_activitie = $datos["id_activitie"];
            
            
            $actualizacion["update"]=$user->save();
            $actualizacion["user"]=$user;

            $token["response"]=response()->json($actualizacion,200);
        }

        return $token["response"];
    }

    //listado de usuarios con filtro, valida que el tipo de usuario sea 2 (visita)
    public function list(Request $request)
    {
        $datos=$request->all();
        $token=\App\Validaciones::validateToken();

        if($token["state"]){
            if($token["user"]->id_type===2){

                $users = User::where('id_type', 1)->with("activitie");

                $users =\App\Validaciones::filtro_list($users, "id_activitie", $datos);
                $users =\App\Validaciones::filtro_list($users, "location", $datos);

                $users = $users->get();
               
                $token["response"]=response()->json($users, "200");
            }else{
                $token["response"]=response()->json(['usuario sin permisos'], "403");
            }
        }

        return $token["response"];
    }

    
}
