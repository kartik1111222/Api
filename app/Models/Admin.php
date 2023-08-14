<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;



class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'admins';

    protected $guard = "admin";

    protected $fillable = [
        'name', 'email', 'password', 'address'
     ];

    
}
