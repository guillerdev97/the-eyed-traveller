<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // create function
    public function create(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'location' => 'required',
            'category_id' => 'required|integer',
            'city_id' => 'required|integer'
        ]);

        $newImage = new Image();

        $newImage->image = $request->image;
        $newImage->title = $request->title;
        $newImage->favs_quantity = 0;
        $newImage->location = $request->location;
        $newImage->category_id = $request->category_id;
        $newImage->city_id = $request->city_id;

        $newImage->save();

        return response()->json([
            'status' => 1,
            'msg' => 'Image created',
            'data' =>  $newImage
        ], 200);
    }

    public function delete($id)
    {
        $image

        $user->delete();

        return response()->json([
            "status" => 1,
            "msg" => "User successfully deleted"
        ], 200);
    }
}
