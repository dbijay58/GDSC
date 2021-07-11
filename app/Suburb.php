<?php

namespace App;
use App\Instructor;
use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    //
    protected $table='suburb';
    protected $fillable = [
        'suburb_name', 'instructor_id','direction'
    ];
    function instructor(){
        return $this-> belongsTo('App\Instructor','instructor_id');
    }
}
