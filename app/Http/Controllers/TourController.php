<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/7/18
 * Time: 12:54 AM
 */

namespace App\Http\Controllers;

use App\Day;
use App\Http\Requests\StoreTourRequest;
use App\Tour;
use App\TourDay;
use Illuminate\Support\Facades\File;

class TourController extends Controller
{
    private $dayModel;
    private $tourModel;
    private $tourDayModel;

    public function __construct(Day $dayModel, Tour $tourModel, TourDay $tourDayModel)
    {
        $this->middleware('onlyAuthUser')->except('index','store','create');
        $this->dayModel = $dayModel;
        $this->tourModel = $tourModel;
        $this->tourDayModel = $tourDayModel;

    }

    /**+
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $randomTours = $this->tourModel->where('id', '!=', $id)->with('days')->orderByRaw("RAND()")->limit(4)->get();
        $tour = $this->tourModel->where('id', $id)->with('days')->first();
        return view('tour', ['tour' => $tour, 'randomTours' => $randomTours]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create-tour');
    }



    public function store(StoreTourRequest $request)
    {

        $days = [];
        $data = $request->except('_token', 'dayName', 'dayDesc');
        $tourId = $this->tourModel->create($data)->id;

        foreach ($request->dayName as $key => $dayName) {
            $days[$key]['name'] = $dayName;
        }
        foreach ($request->dayDesc as $key => $dayDesc) {
            $days[$key]['description'] = $dayDesc;
        }


        foreach ($request->file('dayImg') as $key => $dayImg) {


            if ($dayImg) {

                $fileOriginalName = $dayImg->getClientOriginalName();
                $fileExtension = File::extension($fileOriginalName);
                $generatedFileName = str_random(10);
                $fileName = $generatedFileName . '.' . $fileExtension;
                $days[$key]['img'] = $fileName;
                $dayImg->move(public_path() . '/app-files/tours/' . $tourId . '/day-images/', $fileName);
            }


        }


        foreach ($days as $day) {
            $dayId = $this->dayModel->create($day)->id;
            $this->tourDayModel->create(['day_id' => $dayId, 'tour_id' => $tourId]);
        }



        return redirect('/');
    }
}
