<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\QuoteRequest;
use App\Http\Requests\QuoteStateRequest;
use App\Http\Resources\QuotesResource;
use App\Http\Resources\QuoteResource;
use App\Services\QuoteService;

class QuoteController extends Controller
{

    private $quoteService;

    public function __construct (){
        $this->quoteService=new QuoteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new QuoteResource($this->quoteService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuoteRequest $request)
    {
        return new QuotesResource($this->quoteService->store($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new QuotesResource($this->quoteService->find($id));
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuoteStateRequest $request, $id)
    {
        return new QuotesResource($this->quoteService->update($request->all(),$id));
    }
}
