<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use App\Http\Requests\AutenticateRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserUpdateResource;

class UserController extends Controller
{
    private $userService;

    public function __construct (){
        $this->userService=new UserService;
    }

    //login
    public function authenticate(AutenticateRequest $request)
    {
        return $this->userService->autenticate($request);
    }

    //get user
    public function getAuthenticatedUser()
    {
        return new UserResource($this->userService->get_user());
    }

    //registro de usuario
    public function register(UserRequest $request)
    {
        return new UserResource($this->userService->register($request));
    }

    //update usuario
    public function update(UserUpdateRequest $request)
    {

        return $this->userService->update($request);

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
