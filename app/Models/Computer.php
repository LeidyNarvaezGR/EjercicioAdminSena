<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

<<<<<<< HEAD
       public function Apprentice(){
=======
    public function Apprentice(){
>>>>>>> 3d896b61be47d8c9c3a8ea506e4b2dfcdedfa1d9
        return $this->hasOne('App\Models\Apprentice');
    }
  
}
