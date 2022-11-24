<?php 

namespace App\Services;


use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Repositories\UserRepository;

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

    public function get_user(){
        return JWTAuth::parseToken()->authenticate();
    }

    public function register($request){
        $ip= \App\Api::get_ip();
        $direccion= \App\Api::get_address($ip);

        return $this->repository->store($request,$direccion);
    }

    public function update($request){
        $token=\App\Validaciones::validateToken();

        return $this->repository->update($request,$token);
    }

    public function list($request){
        return $this->repository->list($request);
    }

}
