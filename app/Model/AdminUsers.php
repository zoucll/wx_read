<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUsers extends Model
{
    //制定数据表
    protected $table = 'admin_user';

    /**
 * @desc 通过用户获取用户['状态正常的]
 * @param $username
 * @return array
 */
    public static function getUserByName($username)
    {
        $userInfo = self::where('username',$username)
            ->where('status',1)
            ->first();
        return $userInfo;
    }


    /**
     * @desc 通过用户获取用户['状态正常的]
     * @param $username
     * @return array
     */
    public static function getByUserId($id)
    {
        $userInfo = self::where('id',$id)
            ->where('status',1)
            ->first();
        return $userInfo;
    }

    /**
     * 用户保存
     */
    public function addRecord($data){
        return self::insert($data);
    }

    /**
     * 修改用户信息
     */
    public static function updateUser($data,$id){
        return self::where('id',$id)->update($data);
    }

    /**
     * 获取最新的id
     */
    public function getMaxId()
    {
        return self::select('id')->orderBy('id','desc')->first();
    }

    /**
     * 获取 用户列表信息
     */
    public static function getList(){
        return  self::paginate(5);
    }

    /**
     * 用户删除
     */
    public static  function del($id){
        return self::where('id',$id)->delete();
    }





}
