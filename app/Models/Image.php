<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'favs_quantity',
        'location',
        'category_id',
        'city_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }
}
