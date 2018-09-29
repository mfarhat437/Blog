<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Like;
use App\Setting;

use App\Category;
use App\Http\Middleware\checkrole;
use DB;
class postscontroller extends Controller
{
    

    public function posts(){
        $posts=Post::get();
        $userid=Post::value('user_id');
       //$categoryname=Post::where('id',Post::with('category_id'))->value('name')->get();
        $username=User::where('id',$userid)->value('name');
        return view('content.posts',compact('posts','username'));
    
    }

        public function post(Post $post){
            $close_comments= Setting::where('name','close_comments')->value('value');
        $posts=Post::get();
        $userid=Post::value('user_id');
        $username=User::where('id',$userid)->value('name');
      //  $post=DB::table('posts')->find($post->id);
        return view('content.post',compact('post','close_comments','username'));
    
    }

    
    
   
    public function addpost(request $request ){
        
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'img'=>'required|image',

        ]);
        $image_name=time().request('img')->getclientoriginalextension();

        $post=new Post;
        $post->title=request('title');
        $post->body=request('body');
        $post->image=$image_name;
        $post->category_id=1;
        $post->user_id=auth()->user()->id;

        request('img')->move(public_path('uploads'),$image_name);
        
        $post->save();

        return redirect('/posts');
    }
    
        public function category($name){
        
        $cat=Category::where('name',$name)->value('id');
        $posts=Post::where('category_id',$cat)->get();
            return view('content.category',compact('posts','cat'));
        
        }
        
    public function admin(){
        return view('admin');
    }
    
    
    public function statistics(){
        $users=User::count();
        $posts=Post::count();
        $comments=Comment::count();
        
         //most active user

        
        $most_commented=User::withcount('comments')->orderby('comments_count','desc')->first();
        $user_likes=Like::where('user_id',$most_commented->id)->count();
        $total1= $most_commented->comments_count+ $user_likes;
        
        $most_liked=User::withcount('likes')->orderby('likes_count','desc')->first();
        $user_comments=Comment::where('user_id',$most_liked->id)->count();
        $total2=$most_liked->likes_count+$user_comments;
        
        if($total1 > $total2){
            $name=$most_commented->name ;
        }else{
           $name= $most_liked->name;
        }
        //most active post
        
        $most_commented_post=Post::withcount('comments')->orderby('comments_count','desc')->first();
        $post_likes=Like::where('post_id',$most_commented_post->id)->count();
        $all1=$most_commented_post->comments_count+$post_likes;
        
        $most_liked_post=Post::withcount('likes')->orderby('likes_count','desc')->first();
        $post_comments=Comment::where('post_id',$most_liked_post->id)->count();
        $all2=$most_liked_post->likes_count+$post_comments;
        
        if($all1 > $all2){
            $post_title=$most_commented_post->title ;
        }else{
           $post_title= $most_liked_post->title;
        }
        
        return view('statistics',compact('users','posts','comments','name','post_title'));
    }

}










