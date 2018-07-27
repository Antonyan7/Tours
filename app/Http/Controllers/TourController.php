<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/7/18
 * Time: 12:54 AM
 */

namespace App\Http\Controllers;

use App\Category;
use App\Day;
use App\Http\Requests\StoreTourRequest;
use App\Tour;
use App\TourDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TourController extends Controller
{
    private $dayModel;
    private $tourModel;
    private $tourDayModel;
    private $categoryModel;

    public function __construct(Day $dayModel, Tour $tourModel, TourDay $tourDayModel,Category $categoryModel)
    {
        $this->middleware('onlyAuthUser')->except('index','postBook');
        $this->dayModel = $dayModel;
        $this->tourModel = $tourModel;
        $this->tourDayModel = $tourDayModel;
        $this->categoryModel = $categoryModel;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $randomTours = $this->tourModel->where('id', '!=', $id)->with('days')->orderByRaw("RAND()")->limit(4)->get();
        $tour = $this->tourModel->where('id', $id)->with('days','category')->first();
        if ($tour) {
            return view('tour', ['tour' => $tour, 'randomTours' => $randomTours]);
        } else {
            dd('no tour');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id = null)
    {
        $categories = $this->categoryModel->get();
        $data = [
            'tour' => null,
            'id'=> null,
            'categories' => $categories
        ];
        if($id){
            $tour = $this->tourModel->where('id',$id)->first();
            if($tour){
                $data['tour'] = $tour;
            }
        }


        return view('create-tour',$data);
    }


    public function store($updateId = null,StoreTourRequest $request)
    {
        $days = [];
        $data = $request->except('_token', 'dayName', 'dayDesc','dayImg','tourImage','dayId');
        if($updateId){
            $this->tourModel->where('id',$updateId)->update($data);
            $tourId = $updateId;
        }else{
            $tourId = $this->tourModel->create($data)->id;
        }

        $tourImage = $request->file('tourImage');

        if ($tourImage) {
            $fileOriginalName = $tourImage->getClientOriginalName();
            $fileExtension = File::extension($fileOriginalName);
            $generatedFileName = str_random(10);
            $fileName = $generatedFileName . '.' . $fileExtension;
            $tourImage->move(public_path() . '/app-files/tours/' . $tourId, $fileName);
            $this->tourModel->where('id',$tourId)->update(['img' => $fileName]);
        }

        foreach ($request->dayName as $key => $dayName) {
            $days[$key]['name'] = $dayName;
        }
        foreach ($request->dayDesc as $key => $dayDesc) {
            $days[$key]['description'] = $dayDesc;
        }foreach ($request->dayId as $key => $dayId) {
        $days[$key]['id'] = $dayId;
        }


        if ($request->file('dayImg')) {

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
        }

        foreach ($days as $day) {
            $data = array_except($day,'id');

            if($day['id']){
                $dayId = $day['id'];
                if(!isset($data['img'])){
                    $data = array_except($data,'img');
                }
                $this->dayModel->where('id',$dayId)->update($data);
            }else{
                $dayId = $this->dayModel->create($data)->id;
                $this->tourDayModel->create(['day_id' => $dayId, 'tour_id' => $tourId]);
            }
        }

        return redirect()->action('TourController@index',$tourId);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $tour = $this->tourModel->where('id', $id)->with('days', 'tourDays')->first();

        if (isset($tour->id)) {

            foreach ($tour->days as $day) {
                $day->delete();
            }

            foreach ($tour->tourDays as $tourDay) {
                $tourDay->delete();
            }
            $tour->delete();

            File::deleteDirectory(public_path() . '/app-files/tours/' . $id);

            return redirect()->action('HomeController@index');
        }else{
            dd('no tour');
        }

    }

    public function postBook(Request $request){
        $tourId = $request->tourId;
        $tour = $this->tourModel->where('id',$tourId)->first();
        $bookData = $request->except('_token','tourId');



        return view('bookMail');
    }

}
