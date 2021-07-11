<?php

namespace App;
use App\Suburb;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table="instructors";

    protected $fillable = [
        'name', 'email', 'phone','start_suburb'
    ];

    function suburbs(){
        return $this-> hasMany('App\Suburb','instructor_id');
    }
    //
}
