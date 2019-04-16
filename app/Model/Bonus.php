<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    //
    protected $table="jy_bonus";
    public $timestamps = true;

    public function del($id){
        return self::where('id',$id)->first();
    }
}
