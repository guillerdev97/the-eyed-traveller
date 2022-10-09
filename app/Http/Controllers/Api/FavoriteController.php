<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;

class FavoriteController extends Controller
{
    public function list() {
        
    }
    public function add($id) {
        $user = auth()->user();

        $images = Image::where('user_id', '!=', $user->id)
            ->find($id);

            return response()->json([
                'status' => 1,
                'msg' => 'Favorite image',
                'data' => $images
            ], 200);
    }
}
