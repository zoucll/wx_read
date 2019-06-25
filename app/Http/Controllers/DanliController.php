<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ds\Danli;
class DanliController extends Controller
{
    //
    public function index(){


        $instance = Danli::getInstance(['name'=>12]);

        $instance->getName();
    }
}
