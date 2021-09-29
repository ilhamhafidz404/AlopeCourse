<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Biodata extends Model
{
  use HasFactory;
  protected $fillable = [
    "user_id",
    'twitter',
    'instagram',
    'facebook',
    'website',
    'github',
    'from',
    'job'
  ];


  public function User() {
    return $this->belongsTo(User::class);
  }
}