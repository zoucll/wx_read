<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    //文章列表
    protected $table = "jy_article_category";

    public $timestamps = false;
    //获取分类列表的数据
    public  function getCategoryList(){
        return self::get()->toArray();
    }
    //执行分类添加
    public  function doAdd($data){
        return self::insert($data);
    }
    //执行删除
    public  function  del($id){
        return self::where('id',$id)->delete();
    }
    //文章编辑
    public  function edit($id){

        $info =  self::where('id',$id)->first();
        return $info;
    }
    //文章执行编辑
    public static function  doEdit($data,$id){
//        dd($id);
        return self::where('id',$id)->update($data);
    }
}
