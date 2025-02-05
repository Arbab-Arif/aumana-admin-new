<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsUser extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'phone_number', 'write_messages'];
}
