<?php 

namespace App\Services;

use App\Repositories\ActivitieRepository;

class ActivitieService
{
    protected $repository;

    public function __construct (){
        $this->repository=new ActivitieRepository;
    }

    public function list(){
        
        return $this->repository->all();
    }

    public function store($data){
        
        return $this->repository->store($data);
    }

    public function update($data,$id){
        
        return $this->repository->update($data,$id);
    }
}    