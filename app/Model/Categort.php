<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categort extends Model
{
    //
    protected $table="categort";

    /**
     * 获取分类列表
     */
    public function getLists(){
        return self::paginate(5);
    }

    /**
     * 添加分类
     */
    public function addRecord($data){
        return self::insert($data);
    }

    //删除记录
    public function delRecord($id){
        return self::where('id',$id)->delete();
    }

    //获取分类
    public function getCategort(){
        return $res =  self::get()->toArray();

    }

    //修改分类
    public function doEdit($data,$id){
        return self::where('id',$id)->update($data);
    }
    //获取分类详情
    public function getCateById($id){
        return  self::where('id',$id)->first();
    }

}
