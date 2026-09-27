<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

<<<<<<< HEAD

    public function Course(){
        return $this->belongsToMany('App\Models\ Course');
=======
     public function Course(){
        return $this->belongsToMany('App\Models\Course');
>>>>>>> 3d896b61be47d8c9c3a8ea506e4b2dfcdedfa1d9
    }
}
