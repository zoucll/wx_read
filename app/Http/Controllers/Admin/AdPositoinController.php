<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdPosition;

class AdPositoinController extends Controller
{
    //广告位列表
    public function list(){
        $res = new AdPosition();
        $assgin['res'] = $res->getList();

        return view('admin.position.list',$assgin);
    }
    //广告位添加
    public function add(){
        return view('admin.position.add');
    }
    //保存信息
    public function store(Request $request){
        $params = $request->all();
        unset($params['_token']);

        $position = new AdPosition();
        $res = $position->doAdd($params);
        if(!$res){
            return redirect()->back()->with('msg','广告位添加失败 ');
        }
        return redirect('/admin/position/list');
    }

    //广告位删除
    public function del($id){
        $position = new AdPosition();
        $res = $position->del($id);
        if(!$res){
            return redirect()->back()->with('msg','广告位 删除失败');
        }
        return redirect('/admin/position/list');
    }

    //广告位编辑
    public function edit($id){
        $position = new AdPosition();
        $res['info'] = $position->edit($id);
//        dd($res);
        return view('/admin/position/edit',$res);//上传数据到页面
    }
    //广告为执行编辑
    public function doEdit(Request $request){
        $params = $request->all();
        unset($params['_token']);
        $position = new AdPosition();
        $id=$params['id'];
        $res = $position->doEdit($params,$id);
        if(!$res){
            return redirect()->back()->with('msg','广告位修改失败');
        }
        return redirect('/admin/position/list');
    }

}
