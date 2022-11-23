<?php

namespace App\Repositories;

use App\Models\StateQuote;

class StateQuoteRepository
{
    public function find($data){
        $state= StateQuote::find($data);

        return $state;
    }
}