<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//use Illuminate\Database\Eloquent\Model;
use App\Post;
class Category extends Authenticatable
{
    use Notifiable;
    protected $table='categories';
    
        protected $fillable=[
    
        'name','description'
    ];

    
    public function posts(){
        return $this->hasmany(Post::class);
    }
}
