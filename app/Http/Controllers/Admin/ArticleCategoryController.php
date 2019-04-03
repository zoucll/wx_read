<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ArticleCategory;


class ArticleCategoryController extends Controller
{
    protected $articleCategory = null;
    public function __construct()
    {
        $this->articleCategory  = new ArticleCategory();
    }

    //文章分类列表
    public function list(){
        $assgin['list'] = $this->articleCategory->getCategoryList();//获取列表信息
        return view('admin.article.category.list',$assgin);
    }
    //文章分类添加
    public function add(){
        return view('admin.article.category.add');
    }
    //文章分类执行添加
   public function store(Request $request){
        $params = $request->all();
        if(!isset($params['cate_name'])||empty($params['cate_name'])){
            return redirect()->back()->with('msg','分类名称不能为空');
        }
        unset($params['_token']);

        $res = $this->articleCategory->doAdd($params);
        if(!$res){
            return redirect()->back()->with('msg','分类名称添加失败');
        }
        return redirect('/admin/article/category/list');
   }
   //文章的删除
    public function del($id){
        $res = $this->articleCategory->del($id);

        return redirect('/admin/article/category/list');
    }
    //文章编辑
    public function edit($id){
        $assgin['info'] =$this->articleCategory->edit($id);

        return view('/admin/article/category/edit',$assgin);
    }
    //文章执行编辑
    public function doEdit(Request $request){
        $params = $request->all();

        if(!isset($params['cate_name'])||empty($params['cate_name'])){
            return redirect()->back()->with('msg','分类名称不能为空');
        }
        unset($params['_token']);
        $id = $params['id'];
//       dd($params);
;        $res = ArticleCategory::doEdit($params,$id);

        if(!$res){
            return redirect()->back()->with('msg','分类修改失败');
        }
        return redirect('/admin/article/category/list');
    }
}
