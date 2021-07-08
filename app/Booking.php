<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = 'bookings';

    public function user(){
    	return $this->belongsTo(User::Class,'customer_id');
    }
}
