<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        Inertia::share([
            'unsplashSearch' => route('unsplash_search'),
            'image' => route('image'),
            'imageShow' => route('image_show'),
            'imageDestroy' => route('image_destroy', ':id')
        ]);
        /*Inertia::share([
            'imageUpdate' => route('image_update')
        ]);*/
    }

    public function search()
    {
        return Inertia::render('search',[
            'data' => 'test'
        ]);
    }
    public function mediaLibrary()
    {
        return Inertia::render('mediaLibrary',[
            'data' => 'test'
        ]);
    }
    public function home()
    {
        return Inertia::render('home',[
            'data' => 'test'
        ]);
    }
   

}
