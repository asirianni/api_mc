<?php 

namespace App\Services;

use App\Repositories\ValuationRepository;

class ValuationService
{
    protected $repository;

    public function __construct (){
        $this->repository=new ValuationRepository;
    }

    public function store($data){
        
        return $this->repository->store($data);
    }

    public function find($data){
        return $this->repository->find($data);
    }
}  