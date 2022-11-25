<?php 

namespace App\Services;

use App\Repositories\StateQuoteRepository;

class StateQuoteService
{
    protected $repository;

    public function __construct (){
        $this->repository=new StateQuoteRepository;
    }

    public function find($data){
        return $this->repository->find($data);
    }
}  