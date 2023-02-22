<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = 'mysql';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'username',
        'email',
        'password',
        'image',
        'alt',
        'about',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function validateUsersUpdate($request){
        $request->validate([
            'image' => 'image|max:2000|mimes:jpg,png,jpeg',
            'gameroles' => 'required|exists:game_roles,id'
        ]);
    }

    public static function validateAdminsUpdate($request){
        $request->validate([
            'username' => 'required|alpha_num|min:4|max:20',
            'password'=>'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'role_id'=>'required|exists:roles,id'
        ]);
    }

    public function log($data){
        if(Storage::disk("local")->exists("log.txt")){
            Storage::append("log.txt",$data);
        }
        else{
            Storage::disk("local")->put("log.txt",$data);
        }
    }

    public static function getAllUsers(){
        return User::with('roles')->get();
    }

    public function roles(){
        return $this->belongsTo(Role::class);
    }

    public function gameroles(){
        return $this->belongsToMany(GameRoles::class,'users_game_roles');
    }

    public function tables(){
        return $this->hasMany(Table::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
