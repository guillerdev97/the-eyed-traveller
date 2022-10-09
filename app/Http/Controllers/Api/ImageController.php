<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    // create function
    public function create(Request $request)
    {
        $user = auth()->user();

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
        $newImage->user_id = $user->id;
        $newImage->category_id = $request->category_id;
        $newImage->city_id = $request->city_id;

        $newImage->save();

        return response()->json([
            'status' => 1,
            'msg' => 'Image created',
            'data' =>  $newImage
        ], 200);
    }

    public function listAllImages()
    {
        $images = Image::all();

        return response()->json([
            'status' => 1,
            'msg' => 'List of images',
            'data' => $images
        ], 200);
    }

    public function listUserImages()
    {
        $user = auth()->user();

        $images = $user->images;

        return response()->json([
            'status' => 1,
            'msg' => 'List of images',
            'data' => $images
        ], 200);
    }

    public function delete($id)
    {
        $user = auth()->user();

        $image = $user->images
            ->find($id);

        $image->delete();

        return response()->json([
            'status' => 1,
            'msg' => 'Image deleted',
            'data' => $image
        ], 200);
    }
}
