<?php

namespace App;
use Illuminate\Notifications\Notifiable;


//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class Comment extends Authenticatable
{
        use Notifiable;
        protected $table='comments';

        protected $fillable=[
    
        'body',
    ];
    
    
    
    
    public function post(){
        
        return $this->belongsto(Post::class);
    }
    
    public function user(){
        
        return $this->belongsto(User::class);
    }

}
