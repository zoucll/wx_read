<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Categort;

class CategortController extends Controller
{
    //分类列表
    public function list(){
        $categort = new Categort();
        $assgin['categorts'] = $categort->getLists();
        return view('admin.categort.list',$assgin);
    }

    //分类添加页面
    public function create(){
        return view('admin.categort.create');
    }

    //保存
    public function store(Request $request){
        $params = $request->all();
        $data = [
            'c_name'=>$params['c_name'] ?? '',
        ];
        $categort = new Categort();

        $res = $categort->addRecord($data);
        if(!$res){
            return  redirect()->back();
        }
        return redirect('/admin/categort/list');
    }

    //删除
    public function del($id){
        $categort = new Categort();
        $categort->delRecord($id);
        return redirect('admin/categort/list');
    }

    //修改
    public function edit($id){
        $categort = new Categort();
        $assgin['categorts'] = $categort->getCateById($id);

        return view('admin.categort.edit',$assgin);

    }
    //执行修改
    public function doEdit(Request $request){
        $params = $request->all();

        $data = [
            'c_name'=>$params['c_name'] ?? '',
        ];

        $categort = new Categort();

        $res = $categort->doEdit($data,$params['id']);
        //执行失败
        if(!$res){
            return redirect()->back();
        }
        return redirect('/admin/categort/list');
    }
}
