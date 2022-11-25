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
use App\Http\Resources\UserCollection;
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
        return $this->userService->autenticate($request->all());
    }

    //get user
    public function getAuthenticatedUser()
    {
        return new UserUpdateResource($this->userService->get_user());
    }

    //registro de usuario
    public function register(UserRequest $request)
    {
        return new UserUpdateResource($this->userService->register($request->all()));
    }

    //update usuario
    public function update(UserUpdateRequest $request)
    {
        return new UserUpdateResource($this->userService->update($request->all()));
    }

    // lista de usuarios
    public function list()
    {
        return new UserCollection($this->userService->list());
    }

    
}
