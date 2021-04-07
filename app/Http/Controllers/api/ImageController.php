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
            'urlfull'=>$request->urlfull,
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

    public function highlight($image)
    {
        logger($image);
        //find image then hightlight
       
       $find=Image::where('id', $image)->first();
      
        if($find==true){
           
            return true;
        }
        return false;
       
        
    }
    
    
    public function destroy(Image $image)
    {
        logger($image);
        return $image->delete();   
    }

    public function index(Image $image)
    { 

        $res = DB::table('images')->get();
        $arr=[];
        foreach ($res as $re) {
            $tem = array($re->id,$re->description,$re->url, $re->urlfull); 
            $arr[]=$tem;
        }
       return $arr;

        
    }



}
