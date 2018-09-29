<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Middleware\checkrole;
use App\Like;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function user(){
        return $this->hasmany('App\Role','user_role','user_id','role_id');
    }
    
    
    public function hasrole($role){
        if($this->roles()->where('name',$role)->first()){
            return true;
        }else{
            return false;
        }
    }
    
    public function hasanyrole($roles){
        
            if(is_array($roles)){
            foreach($roles as $role){
               if($this->hasrole($role)){   
                  return true;
               }
                   }
                }else{
        
                    if ($this->hasrole($roles)){
                       return true;
                }
            }
    }
    
        public function likes(){
        
        return $this->HasMany(Like::class);
    }

        public function comments(){
        
        return $this->HasMany(Comment::class);
    }
  
        public function posts(){
        
        return $this->HasMany(Post::class);
    }
    
}
