<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Studencontroller extends Controller
{
    //
    public function index(){
        $list  = \App\Model\Student::getStudents();

        dd($list);
    }

}
