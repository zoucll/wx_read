<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CHUNcontroller extends Controller
{
    public function qian(Request $request){
        //接收参数
        $params  = $request->$param();

        $return = [
            'code'=>2000,
            'msg'=>'签到成功',
            'data'=>[]
        ];

        if(!isset($params['userid'])||empty($params['userid'])){
            $return  = [
                'code'=>'用户id不能为空'
            ];
            return json($return);
        }
        $userId =$params['userId'];
        //获取今天的日期
        $today = date('Y-m-d');
        //根据当前用户id查询签到的数据
        $sign1 = DB::select('select * from sign_info where userid = ?',[$userId]);
        if(!empty($sign1)){
            $return = [
                'code '=>4001,
                'msg'=>'已签到,请明天在来'
            ];
            return json($return);

            if(empty($sign1)){//第一次签到的时候
                DB::insert('insert into sign_info(userid,c_date,total_scores,total_days,last_date )values(?,?,?,?,?)',[$userrId,1,1,1,$today]);
                $return[data]['score']=1;
                return json($return );
            }else{
                //昨天的日期
                $last_day = date('Y-m-d',time()-3600*24);
                if($last_day ==$sing1[0]['total_scores']){//连续注册
                    //连续签到
                    $days = $sign1[0]['c_date']+1;
                }else{
                    $days =1;
                }
                $total_scores = $sign1[0]['total_scores']+$days;
                $total_days = $sign1[0]['total_days']+1;

                DB::update('update sign_info set c_date =?,total_scores = ?, total_days=?,last_date = ? where userid = ?',[$days,$total_scores,$total_days,$today,$userId]);
                $return['data']['scores'] = $days;
                return json($return);
            }
        }
        //签名的列表

    }
}
