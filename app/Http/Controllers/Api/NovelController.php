<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Novel;

class NovelController extends Controller
{
    //小说书单接口
    public function bookList(Request $request){
        $novel  = new Novel();
        $list = $novel->getLists()->toArray();
        dd($list);
         $return  = [
             'code'=>2000,
             'msg'=>'获取小数书单成功',
             'data'=>[
                 'page'=>$list['current_page'],//当前页数
                 'total_page'=>$list['last_page'],//总页数
                 'list'=>$list['data']
             ]
         ];
         return json_encode($return);
    }

    //获取阅读榜单成功
    public function bookRank(Request $request){
        $num = $request->input('num',8);
        $novel = new Novel();
        $list = $novel->getReadRank($num);

        $return  = [
            'code'=>2000,
            'msg'=>'获取阅读榜单成功',
            'data'=>[
                'page'=>$list['current_page'],//当前页数
                'total_page'=>$list['last_page'],//总页数
                'list'=>$list
            ]
        ];
        return json_encode($return);
    }

    //小说详情接口
    public function detail($id){
        $novel = new Novel();
        $detail = $novel->geApiNovelDetail($id);
        $return  = [
            'code'=>2000,
            'msg'=>'获取小说详情成功',
            'data'=>$detail
        ];
        return json_encode($return);

    }
}
