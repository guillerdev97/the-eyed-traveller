<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // list all images 
    public function listAllImages()
    {
        $images = Image::orderBy('favs_quantity', 'DESC')
            ->get();

        return response()->json([
            'status' => 1,
            'msg' => 'List of images',
            'data' => $images
        ], 200);
    }

    // list user images (duplicate values no)
    public function listUserImages()
    {
        $user = auth()->user();

        $myImages = $user->images;

        $userImages = $user->image;

        return response()->json([
            'status' => 1,
            'msg' => 'List of user images',
            'myImages' => $myImages,
            'userImages' => $userImages,
        ], 200);
    }

    // create image
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

    // delete image
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

    // update image
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $image = $user->images
            ->find($id);

        $image->image = $request->image;
        $image->title = $request->title;
        $image->location = $request->location;
        $image->category_id = $request->category_id;
        $image->city_id = $request->city_id;

        $image->update();


        return response()->json([
            'status' => 1,
            'msg' => 'Image updated',
            'data' => $image
        ], 200);
    }
}
