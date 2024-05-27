<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollageImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'collage_id',
        'image_id',
        'layout_index',
        'converted_image',
        'is_converted'
    ];
      protected $with = ['image'];


    public function collage()
    {
        return $this->belongsTo(Collage::class, 'collage_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class,'image_id','id');
    }
}
