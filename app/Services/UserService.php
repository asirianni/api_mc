<?php 

namespace App\Services;

use App\Repositories\UserRepository;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserService
{
    protected $repository;

    public function __construct (){
        $this->repository=new UserRepository;
    }

    public function autenticate($request){
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
    }  