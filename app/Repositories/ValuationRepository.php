<?php

namespace App\Repositories;

use App\Models\Valuations;

class ValuationRepository
{
    public function store($data){
        $valuation = new Valuations;
        $valuation->points=$data["points"];
        $valuation->detail=$data["detail"];
        $valuation->id_user=$data["id_user"];
        
        $valuation->save();
        
        return $valuation;
    }

    public function find($id){
       
        $valuation = Valuations::find($id);
        
        return $valuation;
    }
}