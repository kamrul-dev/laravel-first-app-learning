<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FirstController extends Controller
{
    public function index(){
        return view('withcontroller');
    }

    public function country(){
        return view('country');
    }
    public function Studentstore(Request $request){
        // return view('student.store');
        dd($request->all());
    }


}