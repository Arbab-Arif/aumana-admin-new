<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'transaction_id',
        'order_number',
    ];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getImage()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function getCollage()
    {
        return $this->belongsTo(Collage::class, 'collage_id', 'id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
