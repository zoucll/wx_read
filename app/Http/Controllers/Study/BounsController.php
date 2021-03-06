<?php
namespace App\Http\Controllers\Study;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BsBonusRecord;
use App\Model\BsBonusRecord1;
use App\Model\BsBonus;
use Log;


class BounsController extends Controller
{
    //
    public function index(){
        echo "1";die;
    }

    //  Whether to allow HTTP file uploads.
    /**
     * @抢红包的业务逻辑
     * 1. 判断红包id和user_id 是否传递
     * 2. 判断一下红包是否存在
     * 3. 判断是否已经抢过红包
     * 3. 判断红包是否已经抢完
     * 4. 是否是最后一个人抢红包
     * @param Request $request
     */

    public function getBonus(Request $request){

        //获取所有参数
//        echo 1;die;
        $params = $request->all();

        $return = [
            'code'=>2000,
            'msg'=>'成功'
        ];
        //用户id
        if(!isset($params['user_id'])||empty($params['user_id'])){
            $return  = [
                'code'=>4001,
                'msg'=>'用户未登录'
            ];

            return json_encode($return);
        }

       //红包id
        if(!isset($params['bonus_id'])||empty($params['bonus_id'])){
            $return  = [
                'code'=>4002,
                'msg'=>'请选择指定的红包'
            ];

            return json_encode($return);
        }

        //2.检测红包是否存在
        $bonus = BsBonus::getBonus($params['bonus_id']);


//        json_decode($bonus,true);
//        print_r($bonus);die;
        if(empty($bonus)){
            dd($bonus);
            $return = [
                'code '=>4003,
                'msg'=>'红包不存在'
            ];
            return json_encode($return);
        }
        //dd('11');
        $record = BsBonusRecord::getRecorByld($params['user_id'],$params['bonus_id']);

        if($record){
            $return  = [
                'code'=>4005,
                'msg'=>'红包已抢过'
            ];
            return json_encode($return);
        }

        //3.红包是否被抢光
        if($bonus->left_amount <=0 || $bonus->left_nums <=0){
            $return = [
                'code'=>4004,
                'msg'=>'红包已经被抢光'
            ];
            return json_encode($return);
        }


        //4. 是否最后一个红包
        if($bonus->left_nums ==1){
            Log::info('最后一个红包,抢到的人id '.$params ['user_id']);

            //用户抢到的金额
            $getMoney = $bonus->left_amount;

            //插入一条bonus_record记录
            $data = [
                'user_id'=>$params['user_id'],
                'bonus_id'=>$params['bonus_id'],
                'money'=>$getMoney,
                'flag'=>1
            ];
            BsBonusRecord::createRecord($data);

            //更新红包得到数
            $data1 = [
                'left_amount'=> 0,
                'left_nums'=> 0
            ];
            BsBonus::updateBounsInfo($data,$params['bonus_id']);
            //评论出人气王
            //1 . 降序排列红包的记录
            $res  = BsBonusRecord::getMaxBonus($params['bonus_id']);
            //2 . 更新抢红包的记录
            BsBonusRecord::updateBonusRecord(['flag'=>2],$res->id);
        }else{
            $min = 0.01;//最小红包的金额
            $max = $bonus->left_amount - ($bonus->left_nums -1)*0.01;//最大金额
            $getMoney = rand ($min*100 ,$max*100)/100;//获取金额随机值

            //插入用户抢到得到一条bonus_record记录
            $data = [
                'user_id'=>$params['user_id'],
                'bonus_id'=>$params['bonus_id'],
                'money'=> $getMoney,
                'flag'=>1
            ];
            BsBonusRecord::createRecord($data);

            //更新红包 金额
            $data1 = [
                'left_amount'=>$bonus->left_amonut->$getMoney,
                'left_nums'=>$bonus->left_nums -1
            ];
            BsBonus::updateBonusInfo($data1,$params['bonus_id']);
        }
    }
}


