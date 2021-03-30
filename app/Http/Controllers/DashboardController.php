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
            'unsplashSearch' => route('unsplash_search')
        ]);
    }

    public function searchImage()
    {
        return Inertia::render('searchImage',[
            
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
