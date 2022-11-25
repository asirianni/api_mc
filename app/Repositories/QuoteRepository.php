<?php

namespace App\Repositories;

use App\Models\Quotes;

class QuoteRepository
{
    
    public function store($data){
        $quote = new Quotes;
        $quote->date=$data["date"];
        $quote->detail=$data["detail"];
        $quote->id_professional=$data["id_professional"];
        $quote->id_visitor=$data["id_visitor"];
        $quote->state=$data["state"];
        $quote->save();
        
        return $quote;
    }

    public function all(){
        $quotes = Quotes::all();

        return $quotes;
    }

    public function find($data){
        $quote= Quotes::find($data);

        return $quote;
    }

    public function update($data,$id){
        $quote= Quotes::find($id);
        $quote->state=$data["state"];
        $quote->save();

        return $quote;
    }
}