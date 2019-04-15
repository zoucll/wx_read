<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdPosition;
use App\Model\Ad;
use App\Tools\ToolsAdmin;
class AdController extends Controller
{

    protected  $postion = null;
    protected  $ad = null;

    public function __construct()
    {
        $this->position = new AdPosition();
        $this->ad = new Ad();
    }

    //广告列表
    public function  list(){
        $assign['list'] = $this->ad->getList();
        return view('admin.ad.list',$assign);
    }
    //广告添加
    public function add(){
        $assgin['position'] = $this->position->getList();//获取广告位列表
        return view('admin.ad.add');
    }
    //执行添加操作
    public function store(Request $request){
        $params = $request->all();
        if(!isset($params['image_url'])||empty($params['image_url'])){
            return redirect()->back()->with('msg','请先上传图片');
        }

        $files = $params['image_url'];

        $params['image_url'] = ToolsAdmin::uploadFile($params['image_url']);
        $params= $this->delToken($params);
        $ad = new Ad();
        $res =$this->storeData($ad,$params);
        if(!$res){
            return redirect()->back()->with('msg','添加广告失败');
        }
        return redirect('/admin/ad/list');
    }
    //广告删除
    public function del($id){
        $ad = new Ad();
        $res =$ad->del($id);
        return redirect('/admin/ad/list',$res);
    }
    //广告编辑
    public function edit($id){
        $ad = new Ad();
        $asgin['info']=$this->getDataInfo($ad,$id);
        $assgin['position'] = $this->position->getList();//获取广告位列表
        return view('/admin/ad/edit',$assgin);
    }
    //执行编辑的过程
    public function doEdit(Request $request)
    {
        $params = $request->all();
        //只有当图片上传选中的时候我们才上传图片
        if(isset($params['image_url']) && !empty($params['image_url'])){
            //return redirect()->back()->with('msg','请先上传图片');
            $params['image_url'] = ToolsAdmin::uploadFile($params['image_url']);
        }
        $params = $this->delToken($params);
        $ad = Ad::find($params['id']);//先查询出来对象
        $res = $this->storeData($ad,$params);
        if(!$res){
            return redirect()->back()->with('msg','修改广告失败');
        }
        return redirect('/admin/ad/list');
    }



}
