<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivitieService;
use App\Http\Resources\ActivitieResource;
use App\Http\Requests\ActivitieRequest;

class ActivitieController extends Controller
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
    public function store(ActivitieRequest $request)
    {
        //
        return new ActivitieResource($this->activitieService->store($request));
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
        return new ActivitieResource($this->activitieService->get($id));
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
        return new ActivitieResource($this->activitieService->update($request, $id));
    }

    
}
