<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lian extends Model
{
    //
    protected $table = "lantern";
    public $timestamps = false;

    public function getList(){
       $yun  = Model::offset(0)->limit(1)->get();

       return $yun;
    }

}
