<?php

namespace App\Http\Controllers\Lian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\lian;
class IndexController extends Controller
{
    public function riddles()
    {
        $lantern = new lian();
        $assign['lanterns'] = $lantern->getList();
        return view('lantern.rantern',$assign);
    }

}