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
        'user_id',
        'category_id',
        'city_id',
    ];

    public function user()
    {
        return $this->belongsToMany(Image::class);
    }

    public function authUser() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    static function getTotalUsersOfImage($id) {
        $image = Image::all()
            ->find($id);

        $favs_quantity = $image->user;
        
        return $favs_quantity;
    }

   
}
