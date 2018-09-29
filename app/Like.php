<?php



namespace App;
use Illuminate\Notifications\Notifiable;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Post;

class Like extends Authenticatable
{
    use Notifiable;
    protected $table='likes';
    
        public function post(){
        
        return $this->belongsto(Post::class);
    }
    
        public function user(){
        
        return $this->belongsto(User::class);
    }

}
