<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ad extends Model
{
    //
    protected $table = "jy_ad";
    public $timestamps = false;

    //广告列表
    public function getList()
    {
        return self::select('jy_ad.*','jy_ad_position.position_name')
            ->leftJoin('jy_ad_position','jy_ad.position_id','=','jy_ad_position.id')
            ->paginate(2);
    }
    //广告添加
    public  function add($data){
        return self::insert($data);
    }
    //广告删除
    public  function del($id){
        return self::where('id',$id)->delete();
    }
    //广告编辑
    public  function edit($id){
        return self::where('id',$id)->first();
    }
    //广告执行编辑
    public  function doEdit($data,$id){
        return self::where('id',$id)->update($data);
    }
}
