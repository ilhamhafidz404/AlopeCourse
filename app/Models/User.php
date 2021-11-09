<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use \App\Models\{Blog, Post, Token, Biodata, Notification};

class User extends Authenticatable implements MustVerifyEmail
{
  use HasFactory,
  Notifiable,
  HasRoles;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name',
    'email',
    'password',
    'status',
    'username',
    'profile'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function Blog() {
    return $this->hasMany(Blog::class);
  }

  public function Post() {
    return $this->hasMany(Post::class);
  }

  public function Token() {
    return $this->hasMany(Token::class);
  }

  public function Notification() {
    return $this->hasMany(Notification::class);
  }

  // public function Message() {
  //   return $this->hasMany(Message::class);
  // }

  public function Biodata() {
    return $this->hasOne(Biodata::class);
  }

  public function Invoice(){
    return $this->hasMany(Invoice::class);
  }
}