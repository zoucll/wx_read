<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "jy_category";

    public $timestamps = false;

    //获取分类列表数据
    public static function getCategoryList(){
       $list = self::get()->toArray();
       return $list;
    }

    //通过父id查询子集分类
    public static function getCategoryByFid($fid=0){
        $list = self::where('f_id',$fid)->get()->toArray();
        return $list;
    }

    //获取分类信息
    public static function getCateInfo($id){
        return  self::where('id',$id)->first();
    }

    //添加分类的数据
    public static function doAdd($data){
        return self::insert($data);
    }
    //删除分类
    public static function del($id){
        return self::where('id',$id)->delete();
    }
    //执行修改编辑
    public static function doUpdate($data,$id){
        return self::where('id',$id)->update($data);
    }

}
