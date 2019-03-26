<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = "role_permission";

    /**
     * 通过role_id删除角色权限的记录
     */
    public function delByRoleId($roleId){
        return self::where('role_id',$roleId)->delete();
    }

    /**
     * 通过用户角色id获取所分配的所有权限节点id
     */
    public function getPermissionByRoleId($roles){
        $data = self::select('p_id')
            ->where('role_id',$roles)
            ->get()
            ->toArray();

        $pids = [];

        foreach($data as $key => $value){
            $pids[]=$value['p_id'];
        }

        return $pids;
    }

    /**
     * 添加新的角色权限
     */
    public function addRolePermission($data){
        return self::insert($data);
    }

}
