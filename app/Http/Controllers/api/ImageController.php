<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

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
        $image=Image::where('id', $request->id)->first();
        if($image==false){
        Image::create([
            'id'=> $request->id,
           
            'description' => $request->description,
            'url' => $request->url,
        ]);
        }else{
            $image->update([
                'description'=>$request->description
            ]);
        }


       /* $image = Image::where('name', 'test')->first();
        $image->delete();
        $image->update([
            'name' => $request->name,
            'description' => $request->description
        ]);*/
    }

   /* public function update(ImageRequest $request)
    {
        //find image then update escription
        $image=Image::where('id', $request->id)->first();
        echo "image ",$image;
        if($image==null){
           
            return;
        }
        $image->update([
            'description'=>$request->description
        ]);
    }*/
    
    
    public function destroy($id)
    {
        echo $id;
        $image=Image::where('id', $id)->first();
        $image->delete();
        
        
       
    }

    public function index(Image $image)
    { 

        $res = DB::table('images')->get();
        $arr=[];
        foreach ($res as $re) {
            $tem = array($re->id,$re->description,$re->url); 
            $arr[]=$tem;
        }
       return $arr;

        
    }



}
