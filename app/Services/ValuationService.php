<?php 

namespace App\Services;

use App\Repositories\ValuationRepository;

class ValuationService
{
    protected $repository;

    public function __construct (){
        $this->repository=new ValuationRepository;
    }
}  