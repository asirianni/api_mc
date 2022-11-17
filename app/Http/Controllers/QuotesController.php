<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Quotes;
use App\Models\StateQuote;
use App\Models\User;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token=\App\Validaciones::validateToken();

        $quotes= Quotes::all();

        foreach ($quotes as $q) {
           $q["state"]=StateQuote::find($q->state);
           $q["id_professional"]=User::find($q->id_professional);
           $q["id_visitor"]=User::find($q->id_visitor);
        }

        $token["response"]=response()->json($quotes,200);

        return $token["response"];
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
            'date' => 'required|date',
            'detail' => 'required|string|max:255',
            'id_professional' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $user=User::find($value);
                    if ($user->id_type === 2) {
                        $fail($attribute.' no type');
                    }
                },
            ],
            'id_visitor' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $user=User::find($value);
                    if ($user->id_type === 1) {
                        $fail($attribute.' no type');
                    }
                },
            ]
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $quote = new Quotes;
        $quote->date=$datos["date"];
        $quote->detail=$datos["detail"];
        $quote->id_professional=$datos["id_professional"];
        $quote->id_visitor=$datos["id_visitor"];
        $quote->state=1;
        $quote->save();
       
        $token["response"]=response()->json($quote,200);


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
        $token=\App\Validaciones::validateToken();

        $quote = Quotes::find($id);
        
        $quote->professional;
        $quote->visitor;
        $quote->state=StateQuote::find($quote->state);

        $token["response"]=response()->json($quote,200);


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
        $datos=$request->all();
        $token=\App\Validaciones::validateToken();
        $quote = Quotes::find($id);      

        if($token["state"]){

            //valida que el usuario del token sea el profesional para cambiar de estado
            if($token["user"]->id===$quote->id_professional){
                

                $validator = Validator::make($request->all(), [
                    'state' => [
                        'required',
                        'integer',
                        function ($attribute, $value, $fail) {
                           
                            if ( $value<1 || $value >4) {
                                $fail($attribute.' no valido (1-4 validos)');
                            }
                        },
                    ]
                ]);

                if($validator->fails()){
                    return response()->json($validator->errors(),400);
                }

                $quote->state=$datos["state"];
                $quote->save();

                $quote->state=StateQuote::find($quote->state);
                               
                $token["response"]=response()->json($quote, "200");
            }else{
                $token["response"]=response()->json(['usuario sin permisos para editar'], "403");
            }
        }

        


        return $token["response"];
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
