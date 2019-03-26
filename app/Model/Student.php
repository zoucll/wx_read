<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table ="sign_info";//指定数据库表明

    public static function getStudents(){
    	$students  = \App\Model\Student::get();

    	return $students;
    }

}
