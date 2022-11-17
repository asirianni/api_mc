<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;

    public function professional()
    {
        return $this->hasOne(User::class,'id','id_professional');
    }

    public function visitor()
    {
        return $this->hasOne(User::class,'id','id_visitor');
    }

    public function state()
    {
        return $this->hasOne(StateQuote::class,'id','state');
    }
}
