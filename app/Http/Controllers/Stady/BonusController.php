<?php

namespace App\Http\Controllers\stady;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Study\BsBonus;
use App\Study\BsBonusRecord;

class BonusController extends Controller
{
    //
    public function addBouns(){

    }
    public function getBonus(Request $request){
        //获取多有的参数
        $params = $request->all();

        //用户id
        if(!isset($params['user_id'])||empty($params['user_id'])){
            $return = [
                'code'=>4001,
                'msg'=>'用户未登录'
            ];
            return json_encode($return);
        }

        //红包id
        if(!isset($params['bonus_id'])||empty($params['bonus_id'])){
            $return  = [
                'code'=>4002,
                'msg'=>'请选择指定红包'
            ];
            return  json_encode($return);

        }

        //2. 检测红包是否存在
        $bonus = BsBonus::getBonusInfo($params['bonus_id']);

        if(empty($bonus)){
            $return  = [
                'code'=>4003,
                'msg'=>'红包不存在'
            ];
            return json_encode($return);
        }

        //3 .红包是否被抢光
        if($bonus->left_amount<=0||$bonus->left_nums<=0){
            $return = [
                'code'=>4004,
                'msg'=>'红包已经被抢光'
            ];
            return json_encode($return);
        }
        //4.是否是最后一个红包
        if($bonus->left_nums ==1){
            Log::info('最后一个红啊,抢到的人的id'.$params['user_id']);

            //用户抢到的金额
            $getMoney = $bonus->left_amount;

            //插入用户抢到的一条bonus_record记录
            $data = [
                'user_id' => $params['user_id'],
                'bonus_id' => $params['bonus_id'],
                'money'    => $getMoney,
                'flag'     =>1
            ];
            BsoBonusRecord::createRecord($data);

            //更新红包的数据

            $data1 = [
                'left_amount'=>0,
                'left_nums'=>0
            ];

            BsBonus::updateBonusInfo($data1, $params['bonus_id']);

            //评选出运气王
            //1. 降序排序红包的记录
            $res = BsBonusRecord::getMaxBonus($params['bonus_id']);

            //2. 更新抢红包的记录
            BsBonusRecord::updateBonusRecord(['flag'=>2],$res->id);

        }else{
            $min = 0.01;//最小金额
            $max = $bonus->left_amount - ($bonus->left_nums -1)*0.01; //最大金额
            $getMoney = rand($min*100, $max*100)/100; //获取金额随机值
            //插入用户抢到的一条bonus_record记录
            $data = [
                'user_id' => $params['user_id'],
                'bonus_id' => $params['bonus_id'],
                'money'    => $getMoney,
                'flag'     =>1
            ];
            BsBonusRecord::createRecord($data);
            //更新红包的金额
            $data1 = [
                'left_amount' => $bonus->left_amount - $getMoney,
                'left_nums'  => $bonus->left_nums - 1
            ];
            BsBonus::updateBonusInfo($data1, $params['bonus_id']);
        }
        return json_encode($request);
    }
}
