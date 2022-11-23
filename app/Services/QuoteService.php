<?php

namespace App\Services;

use App\Repositories\QuoteRepository;
use App\Services\StateQuoteService;

class QuoteService
{
    protected $repository;
    protected $stateQuoteService;

    public function __construct (){
        $this->repository=new QuoteRepository;
        $this->stateQuoteService=new StateQuoteService;
    }

    public function store($data){
        
        $data["state"]=1;
        $response=$this->repository->store($data);
        $response["state"]=$this->stateQuoteService->find($response["state"]);
        return $response;
    }

    public function all(){
        
        return $this->repository->all();
    }

    public function find($data){
        $response=$this->repository->find($data);
        $response["state"]=$this->stateQuoteService->find($response["state"]);
        return $response;
    }

    public function update($data, $id){
        $response=$this->repository->update($data, $id);
        $response["state"]=$this->stateQuoteService->find($response["state"]);
        return $response;
    }
}