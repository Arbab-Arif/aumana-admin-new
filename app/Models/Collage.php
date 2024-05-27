<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    use HasFactory;

    protected $table = 'collages';
    protected $fillable = ['user_id', 'category_id', 'layout_id', 'frame_type','collage_image','is_cart'];

    //  protected $with = ['collageImages'];

    public function collageImages()
    {
        return $this->hasMany(CollageImage::class,'collage_id');
    }
}
