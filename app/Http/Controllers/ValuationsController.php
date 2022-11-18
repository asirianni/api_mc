<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Valuations;
use App\Models\User;

class ValuationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $token=\App\Validaciones::validateToken();
        $datos=$request->all();

        $validator = Validator::make($request->all(), [
            'points' => 'required|integer',
            'detail' => 'required|string|max:255',
            'id_user' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $user=User::find($value);
                    if(empty($user)){
                        $fail($attribute.' user no existe');
                    }else{
                        if ($user->id_type !== 2 ) {
                            $fail($attribute.' no type');
                        }
                    }
                },
            ]
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $valuaction = new Valuations;
        $valuaction->points=$datos["points"];
        $valuaction->detail=$datos["detail"];
        $valuaction->id_user=$datos["id_user"];
        
        $valuaction->save();
       
        $token["response"]=response()->json($valuaction,200);


        return $token["response"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $token=\App\Validaciones::validateToken();

        $valuation = Valuations::find($id);
        
        $valuation->id_user=User::find($valuation->id_user);

        $token["response"]=response()->json($valuation,200);


        return $token["response"];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
