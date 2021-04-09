<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Image;

class ImageController extends Controller
{
    public function index()
    { 
        return Image::all()->toArray();
    }

    public function store(ImageRequest $request)
    {
        $image = Image::where('id', $request->id);
        if(!$image->exists()){
            Image::create([
                'id'=> $request->id,
                'description' => $request->description ?? null,
                'url' => $request->url,
                'urlfull' => $request->urlfull,
            ]);
        } else {
            $image->first()->update([
                'description' => $request->description,
            ]);
        }
    }
  
    public function destroy(Image $image)
    {
        return $image->delete();   
    }

    public function highlight($image)
    {
        
        return Image::where('id', $image)->first();
        
        //return Image::where('id', $image)->exists();
    }
}
