<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class commentscontroller extends Controller
{
    //
    
    
    public function addcomment(Post $post){
        
        $comment= new Comment;
        $comment->body=request('body');
        $comment->post_id=$post->id;
       $comment->user_id=auth()->user()->id;
        $comment->save();
        return back();

    }
    
    
    
        /*public function comment( $post){
        $userid=Comment::value('user_id');
        $user_comment_name=User::where('id',$userid)->value('name');
        return view('content.post',compact('user_comment_name'));

    }
*/
    
    
}
