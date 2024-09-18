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


    //store contact
    public function store(Request $request){
        
        $validated = $request->validate(rules: [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:80',
            'password' => 'required|min:6|max:12',
        ]);

        dd($request->all());
    }


}