<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivitieService;
use App\Http\Resources\ActivitiesResource;
use App\Http\Requests\ActivitiesRequest;

class ActivitiesController extends Controller
{
    private $activitieService;

    public function __construct (){
        $this->activitieService=new ActivitieService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->activitieService->list();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivitiesRequest $request)
    {
        //
        return new ActivitiesResource($this->activitieService->store($request));
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
        return new ActivitiesResource($this->activitieService->get($id));
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
        return new ActivitiesResource($this->activitieService->update($request, $id));
    }

    
}
