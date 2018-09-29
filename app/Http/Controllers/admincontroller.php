<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use Illuminate\Auth\Middleware\admin;
class admincontroller extends Controller
{
    public function login(){
          return view('adminlogin');
  
    }
    
    public function dologin(){
        if (auth()->guard('webadmin')->attempt(['email'=>request('email'),'password'=>request('password')])){
          return view('admin');
        }else{
            return back()->witherrors(['message'=>'sorry email & password is not correct']);

        }
    }
    
    public function admincontrol(){
        
        $users=User::all();
        $close_comments=Setting::where('name','close_comments')->value('value');
        
        return view('admincontrol',compact('users','close_comments'));
  
    }
    
    
    
    
    public function stopcomments(request $request){
       if( $request->close_comments){
           Setting::where('name','close_comments')->update(['value'=>1]);
           
       }else{
           Setting::where('name','close_comments')->update(['value'=>0]);

       }
        
        return redirect()->back();
    }
    
}
