<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Log;


class FirstController extends Controller
{
    public function index(){
        // abort(404);
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

        // abort(404);
        return view('laravelview');
    }


    //store contact
    public function store(Request $request){
        
        $validated = $request->validate(rules: [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:80',
            'password' => 'required|min:6|max:12',
        ]);

        // data insert in database
        //insert by query
        //stored record on log file

        Log::channel('contactstore')->info('the contact from submitted by'.rand(1,30));  //.Auth::id()  will here instead of rand();

        // return redirect()->back();


        dd($request->all());
    }


}