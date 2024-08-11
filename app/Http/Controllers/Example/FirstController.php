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
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;

        // dd($data);

        // store to database
        
        // After store the database redirect it
        return redirect()->route('contact.us');

        // return redirect('dashboard')->with('status', 'Profile updated!');
    }

    public function viewlaravel(){
        return view('laravelview');
    }


}