<?php

namespace App\Http\Controllers\Kao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //登录
    public function index(Request $request){
    	$session = $request->session();
    	if($session->has('user')){
    		return redirect('/ass/list');
    	}
    	return view('kao.login');
    }

    //执行登录
    public function index1(Request $request){
    	$params = $request->all();

    	if(empty($params['username'])||empty($params['password'])){
    		
    		return redirect()->back()->with('msg','用户名密码不能为空');
    	}

    	$user = \DB::table('admin_user')->where('username',$params['username'])->where('password',md5($params['password']))->first();

    	if(empty($user)){
    		return redirect()->back()->with('msg','用户名密码错误');
    	}

    	$session = $request->session();
    	$session->put('user',$user->username);

    	return redirect('/ass/list');
    }

    public function list(){

    }

}
