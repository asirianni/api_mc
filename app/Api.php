<?php namespace App;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DateTime;
use DB;

class Api{
    public function __construct(){}


    public static function get_ip(){
        $response = Http::get('http://ipwho.is/');
        return $response->object()->ip;
        
    }

    public static function get_address($ip){
        
        $url="http://ipwho.is/".$ip;
        $response = Http::get($url);
        
        $direccion["address"]=$response->object()->latitude." ; ".$response->object()->longitude;
        $direccion["location"]=$response->object()->city;
        $direccion["province"]=$response->object()->region;
        $direccion["country"]=$response->object()->country;
        
        return $direccion;
    }
}