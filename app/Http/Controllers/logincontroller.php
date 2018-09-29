<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class logincontroller extends Controller
{
    public function login(){
        
        return view ('login');
    }
    
    public function logincheck(){
        
    if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
        return redirect('/posts');
    }else{
        return back()->witherrors(['message'=>'sorry email & password is not correct']);
    }
        
    
    }
    public function logout(){
     
        Auth::user()->logout();
        return redirect('/login');
    }
       

}
