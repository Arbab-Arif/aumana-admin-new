<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollagePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'personal_use_price',
        'corporate_use_price',
        'commercial_use_price',
    ];
}
