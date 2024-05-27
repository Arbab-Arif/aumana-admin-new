<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'image_size_id',
        'name',
        'slug',
        'is_featured',
        'thumbnail_image',
        'standard_image',
        'large_image',
        'large_dpi',
        'large_personal_use_price',
        'large_corporate_use_price',
        'large_commercial_use_price',
        'thumbnail_personal_use_price',
        'thumbnail_corporate_use_price',
        'thumbnail_commercial_use_price',
        'standard_personal_use_price',
        'standard_corporate_use_price',
        'standard_commercial_use_price',
        'description',
        'thumb_size',
        'standard_size',
        'thumb_dpi',
        'standard_dpi',
        'extra_large_size',
        'extra_large_dpi',
        'extra_large_personal_use_price',
        'extra_large_corporate_use_price',
        'extra_large_commercial_use_price',
        'extra_large_image',
        'medium_size',
        'medium_dpi',
        'medium_personal_use_price',
        'medium_corporate_use_price',
        'medium_commercial_use_price',
        'medium_image',

    ];
    protected $with = ['imageSize', 'attributeImages'];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function imageSize()
    {
        return $this->belongsTo(ImageSize::class, 'image_size_id', 'id');
    }

    public function attributeImages()
    {
        return $this->hasMany(AttributeImage::class);
    }



}
