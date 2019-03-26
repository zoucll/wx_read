<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Categort;
use App\Model\Novel;

class CategortController extends Controller
{
    //获取分类列表的接口
    public function getCategort(){
        $categort = new Categort();

        $cList = $categort->getCategort();

            $return = [
            'code'=>2000,
            'msg'=>'获取分类的接口',
            'data'=>$cList
        ];
        return json_encode($return);
    }

    //获取小说分类列表
    public function getCategortNovel(Request $request){
        $cId = $request->input('c_id',1);
        $novel= new Novel();

       $list = $novel->getNovelByCid($cId);
        $return = [
            'code'=>2000,
            'msg'=>'获取分类小说的接口',
            'data'=>$list
        ];
        return json_encode($return);
    }
}
