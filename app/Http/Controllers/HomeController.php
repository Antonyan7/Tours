<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('onlyAuthUser')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tour $tourModel)
    {
        $tours = $tourModel->with('days')->get();
        return view('home',['tours' => $tours]);
    }

}
