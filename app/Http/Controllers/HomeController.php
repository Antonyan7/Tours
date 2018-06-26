<?php

namespace App\Http\Controllers;

use App\Category;
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
    public function index(Tour $tourModel,Category $categoryModel)
    {
        $tours = $tourModel->with('days')->get();
        $categories = $categoryModel->get();
        return view('home',['tours' => $tours,'categories' => $categories]);
    }

}
