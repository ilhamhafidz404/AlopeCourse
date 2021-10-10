<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Token extends Model
{
  use HasFactory;
  protected $fillable = ["user_id",
    "token",
    "expired_at",
    "type",
    "isOrder"];


  public function User() {
    return $this->belongsTo(User::class);
  }
}