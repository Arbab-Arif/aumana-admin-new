<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'author_name',
        'short_description',
        'description',
        'featured_img',
        'image',
    ];

    protected $appends = ['imageLink', 'featuredImgLink'];

    public function getImageLinkAttribute()
    {
        return url('/') . '/blogs/images/' . $this->image;
    }

    public function getFeaturedImgLinkAttribute()
    {
        return url('/') . '/blogs/featured_image/' . $this->featured_img;
    }
}
