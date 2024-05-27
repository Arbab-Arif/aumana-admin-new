<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'image_id',
        'collage_id',
        'image_type',
        'image_size',
        'license',
        'price',
        'license',
    ];
    public function images()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function collage()
    {
        return $this->belongsTo(Collage::class, 'collage_id', 'id');
    }
}
