<?php 

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $repository;

    public function __construct (){
        $this->repository=new UserRepository;
    }
}  