<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class registrationcontroller extends Controller
{
    public function register(){
        
        return view('register');
    }
    
     public function adduser(){
        $add=new User;
        $add->name=request('name');
        $add->password=bcrypt(request('name'));
        $add->email=request('email');
        $add->save();
        auth()->login($add);
        

     return redirect('/posts');
    }
}
