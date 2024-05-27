<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeImage extends Model
{
    use HasFactory;

    protected $table = 'attribute_images';
    protected $fillable = [
        'image_id',
        'select_image_type',
        'size',
        'dpi',
        'personal_use_price',
        'corporate_use_price',
        'commercial_use_price',
        'image',
    ];


    protected $appends = ['price'];

    public function getPriceAttribute()
    {
        $data = [];
        if ($this->personal_use_price) {
            $data[0] = [
                'name'  => 'Personal Use Price',
                'price' => $this->personal_use_price
            ];
        }
        if ($this->corporate_use_price) {
            $data[1] = [
                'name'  => 'Corporate Use Price',
                'price' => $this->corporate_use_price
            ];
        }
        if ($this->commercial_use_price) {
            $data[2] = [
                'name'  => 'Commercial Use Price',
                'price' => $this->commercial_use_price
            ];
        }
        return $data;
    }
}
