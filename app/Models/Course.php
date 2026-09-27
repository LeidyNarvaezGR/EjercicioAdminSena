<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


<<<<<<< HEAD

    public function Apprentice(){
        return $this->belongsTo('App\Models\Apprentice');
    }


    public function Teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }


}
=======
     public function Apprentices(){
        return $this->hasMany('App\Models\Apprentice');
     }
         public function Teacher(){
        return $this->belongsTo('App\Models\Teacher');
         }
    }
>>>>>>> 3d896b61be47d8c9c3a8ea506e4b2dfcdedfa1d9
