<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdPosition extends Model
{
    protected $table = "jy_ad_position";
    public $timestamps = false;
    //广告位列表
    public static  function getList(){
    	return self::get()->toArray();
    }
    //广告位执行添加
    public static function doAdd($data){
        return self::insert($data);
    }
    //广告位删除
    public static function del($id){
        return self::where('id',$id)->delete();
    }
    //广告位编辑
    public static function edit($id){
        return self::where('id',$id)->first();
    }
    //广告位执行编辑
    public static function doEdit($data,$id){
//        dd($data);
        return self::where('id',$id)->update($data);
    }


}
