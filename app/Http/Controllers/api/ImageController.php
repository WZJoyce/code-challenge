<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
   
    public function store(ImageRequest $request)
    {
      
        Image::create([
            'id'=> $request->id,
           
            'description' => $request->description,
            'url' => $request->url,
        ]);


       /* $image = Image::where('name', 'test')->first();
        $image->delete();
        $image->update([
            'name' => $request->name,
            'description' => $request->description
        ]);*/
    }

    public function update(Request $request, Image $image)
    {
        //find image then update escription
        $image=Image::where('id')->first();
        $image->update([
            'description'=>$request->description
        ]);
    }
    
    
    public function destroy(Image $image)
    {
        $image=Image::where('id')->first();
        $image->delete();
    }



}
