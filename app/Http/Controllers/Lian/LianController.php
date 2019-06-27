<?php

namespace App\Http\Controllers\Lian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\AdminUsers;

class LianController extends Controller
{
    //短信验证码的接口
    public function duan(Request $request){
        $shou = $request->input('phone');
        $return  = [
            'code'=>2000,
            'msg'=>'短信验证码发送成功'
        ];
        if(empty($shou)){
            $return = [
                'code'=>4000,
                'msg'=>'手机号不存在'
            ];
           return json_encode($return);
        }
        $redis = new \Redis();
        $redis->connect('127.0.0.1',6379);
        $code = rand(1000,9999);
        $key = "REGISTER_".$shou.'_CODE';
        $redis->setex($key,1800,$code);
       return json_encode($return);
    }

    //用户名修改
    public function user(Request $request){
        $user = $request->input('user_name');
        $return = [
            'code'=>2000,
            'msg'=>'用户名修改成功'
        ];
        if(empty($user)){
            $return =[
                'code'=>4000,
                'msg'=>'用户名不能为空'
            ];
            return json_encode($return);
        }
        $redis = new \Redis();
        $redis->connect('127.0.0.1',6379);
        $key = "REGISTER_".$user.'_CODE';
        $redis->setex($key,1800,$user);
        return json_encode($return);
    }

    //短信验证码
    public function yan(Request $request){
        $params = $request-> input('phone');
        $return = [
            'code'=>2000,
            'msg'=>'短信验证码发送成功'
        ];
        if(empty($params)){
            $return = [
                'code'=>4000,
                'msg'=>'验证码为空'
            ];
            return json_encode($return);
        }
        //实例化redis
        $redis = new \Redis();
        $rand = rand(100,999);
        $redis->connect('127.0.0.1',6379);
        $key = "REGISTER_".$params.'_CODE';
        $redis->setex($key,1800,$rand);
        return json_encode($return);
    }
    //存session
    public function index(Request $request){
        $session = $request->session();

        if($session->has('user')){
            return view('lantern.rantern');//如果没有存session 就到登录页面
        }
        return view('/lantern/login');//存过的session条到后台页面
    }
    //登录的接口
    public function deng(Request $request){
        $params = $request->all();
        $return  = [
            'code'=>2000,
            'msg'=>'登录成功'
        ];
        //用户名不能为空
        if(!isset($params['username'])||empty($params['username'])){
            $return = [
                'code'=>4000,
                'msg'=>'用户名不能为空'
            ];
            return json_encode($return);
        }
        if(!isset($params['password'])||empty($params['password'])){
            $return = [
                'code'=>4001,
                'msg'=>'密码不能为空'
            ];
            return json_encode($return);
        }

        $userInfo= AdminUsers::getUserByName($params['username']);
        //用户不存在
        if(empty($userInfo)){
            $return = [
                'code'=>4002,
                'msg'=>'用户不存在'
            ];
            return json_encode($return);
        }else{
            //传递过来的参数
            $pass = md5($params['password']);
            if($pass!=$userInfo->password){
                $return= [
                    'code'=>4003,
                    'msg'=>'密码不正确'
                ];
                return json_encode($return);
            }else{
                $session = $request->session();//获取session对象
                //存储用户id
                $session->put('user.user_id',$userInfo->id);//用户id
                $session->put('user.username',$userInfo->username);
                $session->put('user.image_url',$userInfo->image_url);
                $session->put('user.is_super',$userInfo->is_super);//是否超管
                return json_encode($return);
            }
        }
    }
}
