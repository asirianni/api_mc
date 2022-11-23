<?php 

namespace App\Services;

use App\Repositories\ActivitieRepository;

class ActivitieService
{
    protected $repository;

    public function __construct (){
        $this->repository=new ActivitieRepository;
    }
}    