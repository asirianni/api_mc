<?php

namespace App\Services;

use App\Repositories\QuoteRepository;

class QuoteService
{
    protected $repository;

    public function __construct (){
        $this->repository=new QuoteRepository;
    }

    public function store($data){
        
        $data["state"]=1;

        return $this->repository->store($data);
    }

    public function all(){
        
        return $this->repository->all();
    }

    public function find($data){
        return $this->repository->find($data);
    }

    public function update($data, $id){
        return $this->repository->update($data, $id);
    }
}