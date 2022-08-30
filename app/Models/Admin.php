<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends User
{
    use HasFactory,Notifiable;
    protected $guarded = [];
    public function roles(){
        return $this -> belongsTo(Role::class,'role_id','id');
    }
}
