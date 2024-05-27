<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_id',
        'collage_id',
        'order_id',
        'image_type',
        'image_size',
        'license',
        'price',
    ];

    public function getCollage()
    {
        return $this->belongsTo(Collage::class,'collage_id','id');
    }

    public function getImage()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
