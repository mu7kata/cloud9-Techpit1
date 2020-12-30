<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function getuser_id(){
        return $this->user_id;
    }
}
