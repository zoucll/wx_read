<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Novel;
use App\Model\Categort;
use App\Model\Author;
use App\Tools\ToolsAdmin;

class NovelController extends Controller
{
    //小说列表
    public function list(){
        $novel = new Novel();
        $assgin['novels'] = $novel->getLists();
        return view('admin.novel.list',$assgin);
    }

    //小说添加页面
    public function create(){
        $categort = new Categort();
        $author = new Author();
        //获取分类列表
        $assgin['c_list'] = $categort->getCategort();
//        dd($assgin);
        //获取作者列表
        $assgin['a_list'] = $author->getAuthor();
        return view('admin.novel.create',$assgin);
    }

    //执行小说添加页面
    public function store(Request $request){
        $params = $request->all();
        $params['image_url'] = ToolsAdmin::uploadFile($params['image_url']);

        unset($params['_token']);
        $novel = new Novel();

        $res = $novel->addRecord($params);
        if(!$res){
            return redirect()->back();
        }
        return redirect('admin/novel/list');
    }

    //小说编辑页面
    public function edit($id){
        $categort = new Categort();
        $author = new Author();
        $novel = new Novel();
        //获取分类列表
        $assgin['c_list'] = $categort->getCategort();
        //获取作者列表
        $assgin['a_list'] = $author->getAuthor();
        //获取小说详情
        $assgin['novel'] = $novel->getNovelInfo($id);

        return view('admin/novel/edit',$assgin);

    }

    //执行小说编辑
    public function doEdit(Request $request){
        $params = $request->all();

        //如果上传图片
        if(isset($params['image_url'])){
            $params['image_url'] = ToolsAdmin::uploadFile($params['image_url']);
        }
        $id = $params['id'];//小说主键id

        unset($params['_token']);
        unset($params['id']);

        $novel = new Novel();
        $res = $novel->editRecord($params, $id);
        if(!$res){
            return redirect()->back();
        }
        return redirect('/admin/novel/list');
    }

    //小说删除操作
    public function del($id){
        $novel = new Novel();
        $novel = $novel->delRecord($id)->delete();
        return redirect('/admin/novel/list');
    }
}
