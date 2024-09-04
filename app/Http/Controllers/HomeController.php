<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->format('l, F j, Y');
        
        return view('home.index', ['date' => $date]);
    }

    public function show($city) 
    {
        return view('home.show', ['city' => $city]);
    }
}
