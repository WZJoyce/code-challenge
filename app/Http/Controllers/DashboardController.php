<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('searchImage',[
            'data' => 'test'
        ]);
    }
    public function index2()
    {
        return Inertia::render('medialibrary',[
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
