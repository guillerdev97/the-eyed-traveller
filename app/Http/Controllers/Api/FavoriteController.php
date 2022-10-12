<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // trending images 
    public function trendingImages() {
        $images = Image::orderBy('favs_quantity', 'DESC')
        ->take(8)->get();

        return response()->json([
            'status' => 1,
            'msg' => 'Trending images',
            'data' => $images
        ], 200);
    } 

    // add image of other user to your images
    public function add($id)
    {
        $image = Image::find($id); 

        $user = User::find(Auth::id()); 

        $user->image()->attach($id);

        return response()->json([
            'status' => 1,
            'msg' => 'Favorite image',
            'data' => $image,
        ], 200);
    }

    public function delete($id)
    {
        $image = Image::find($id);

        $user = User::find(Auth::id()); 

        $user->image()->detach($image);

        return response()->json([
            'status' => 1,
            'msg' => 'Favorite image deleted',
            'data' => $image
        ], 200);
    }

    public function favsQuantity($id) {
        $favs_quantity = Image::getTotalUsersOfImage($id);

        return response()->json([
            'status' => 1,
            'msg' => 'Favorite image deleted',
            'data' => $favs_quantity
        ], 200);
    }

   
}
