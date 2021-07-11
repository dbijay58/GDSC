<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table="accounts";

    function user(){
        return $this->belongsTo('App\User','customer_id');
    }
}
