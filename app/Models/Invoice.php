<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable= ['proof', 'user_id', 'invoice', 'bank_name', 'from', 'to', 'access_type', 'sent_at'];

    public function User(){
        return $this->hasMany(User::class);
    }
}
