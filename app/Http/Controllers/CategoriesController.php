<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    private $categoryModel;
    public function __construct(Category $categoryModel)
    {
        $this->middleware('onlyAuthUser')->except('category');
        $this->categoryModel = $categoryModel;
    }

    public function createCategory()
    {
        return view('create-category');
    }

    public function postCreateCategory(Request $request)
    {
      $data['name'] = $request->name;
      $categoryId = $this->categoryModel->create($data)->id;

        $img = $request->file('img');

        if ($img) {
            $fileOriginalName = $img->getClientOriginalName();
            $fileExtension = File::extension($fileOriginalName);
            $generatedFileName = str_random(10);
            $fileName = $generatedFileName . '.' . $fileExtension;
            $img->move(public_path() . '/app-files/categories/' . $categoryId, $fileName);
            $this->categoryModel->where('id',$categoryId)->update(['img' => $fileName]);
        }

        return redirect()->action('HomeController@index');
    }

    public function category($id, Tour $tourModel, Category $categoryModel){
        $tours = $tourModel->where('category_id',$id)->with('days')->get();
        $categories = $categoryModel->get();

        $data = [
            'tours' => $tours,
            'categories' => $categories,
            'activeCategoryId' => $id,
            'scrollTo' => 'tours',
        ];
        return view('home',$data);
    }
}
