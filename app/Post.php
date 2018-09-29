<?php

namespace App;
use Illuminate\Notifications\Notifiable;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Comment;
use App\Category;
use App\like;


class Post extends  Authenticatable
{
    //
     use Notifiable;
    protected $table='posts';

    protected $fillable=[
    
        'title','body'
    ];
    
        public function comments(){
        
        return $this->HasMany(Comment::class);
    }

        public function category(){
        
        return $this->belongsto(Category::class);
    }
    
            public function likes(){
        
        return $this->HasMany(Like::class);
    }

    
        public function user(){
        
        return $this->belongsto(User::class);
    }

}
