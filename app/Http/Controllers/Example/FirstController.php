<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;


class FirstController extends Controller
{
    public function index(){
        return view('withcontroller');
    }

    public function country(){
        return view('country');
    }


}
