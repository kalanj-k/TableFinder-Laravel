<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameRoles extends Model
{
    use HasFactory;
    protected $table = 'game_roles';

    public function users(){
        return $this->belongsToMany(User::class,'users_game_roles');
    }
}
