<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'user_id',
        'image_id'
    ];

    public function images()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }
}
