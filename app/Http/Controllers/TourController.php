<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/7/18
 * Time: 12:54 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tour');
    }

}
