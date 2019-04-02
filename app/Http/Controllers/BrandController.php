<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    //商品品牌列表
    public function list(){
       return view('admin.brand.list');
    }
}
