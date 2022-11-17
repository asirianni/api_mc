<?php namespace App;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DateTime;
use DB;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class Validaciones{
    public function __construct(){}

    //return array[3]: state,response,user
    public static function validateToken(){
        $data["state"]=false;
        $data["user"]=0;
        $data["response"]=array();

        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                $data["response"]= response()->json(['user_not_found'], 404);
            }else{

                //activamos la relacion de actividad para mostrar
                $user->activitie;

                $data["user"]=$user;
                $data["response"]=response()->json($user);
                $data["state"]=true;
            }
          } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                $data["response"]=response()->json(['token_expired'], $e->getStatusCode());
          } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                $data["response"]=response()->json(['token_invalid'], $e->getStatusCode());
          } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                $data["response"]=response()->json(['token_absent'], $e->getStatusCode());
          }
        return $data;
    }

}