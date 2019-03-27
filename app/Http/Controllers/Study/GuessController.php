<?php

namespace App\Http\Controllers\Study;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Study\Guess;
use Illuminate\Support\Facades\DB;

class GuessController extends Controller
{
    //足球精彩的添加页面
    public function  add(){
        return view('study.guess.add');
    }

    //执行添加页面
    public function doAdd(Request $request){
        $params  = $request->all();
        $guess = new Guess();
        $data  = [
            'tema_a'=>$params['tema_a'],
            'tema_b'=>$params['tema_b'],
            'end_at'=>$params['end_at']
        ];
        $guess->add($data);
        return redirect('/study/guess/list');
    }

    //足球竞猜列表页面
    public function list(Request $request){
        $guess = new Guess();

        $assign['list'] = $guess->getList();

        $assign['user_id'] = isset($params['user_id']) ?? 1;

        return view('study.guess.list',$assign);
    }

    public function guess(Request $request){
        $params = $request->all();
        $guess = new Guess();
        $assign['info'] = $guess->getInfo($params['id']);
        $assign['user_id'] = isset($params['user_id']) ?? 1;
         return view('study..guess.guess',$assign);
    }
    public function doGuess(Request $request){
        $params = $request->all();

        unset($params['_token']);
        $data = DB::table('study_record')->where(['user_id'=>$params['user_id'],'team_id'=>$params['team_id']])->first();
        if(empty($data)){
            DB::table('study_record')->insert($params);
        }else{
            DB::table('study_record')->where('id',$data->id)->update($params);
        }
        return redirect('/study/guess/list?user_id=1');
    }
    public function checkResult(Request $request){
        $params = $request->all();
//        dd($params);
        $info = new Guess();
        $assign['info'] = $info->getInfo($params['id']);
        $assign['first'] = DB::table('study_record')->where(['user_id'=>1,'team_id'=>$params['id']])->first();
//        dd($assign);
        return view('study.guess.result',$assign);
    }
}
