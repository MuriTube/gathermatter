<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
     public function index()
     {
         $upcomingEvents = Event::where('date', '>=', now())
             ->orderBy('date', 'asc')
             ->take(3)
             ->get();
     
         return view('index', compact('upcomingEvents'));
     }
     
}
