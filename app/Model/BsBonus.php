<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BsBonus extends Model
{
    //红包表
    protected $table = 'bs_bonus';

    /**
     * @desc 获取红包信息
     * @param $id
     */
    public static function getBonus($id){

        $bonus = DB::table('bs_bonus')->where('id',$id)->first();
        return $bonus;
    }

    /**
     * @desc 更新红包信息
     */
    public static function updateBonusInfo($data,$id){
        return self::where('bonus_id',$id)->update($data);
    }
}
