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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createCategory()
    {
        return view('create-category');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param $id
     * @param Tour $tourModel
     * @param Category $categoryModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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


    /**
     * @param $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editCategory($categoryId)
    {
        $category = $this->categoryModel->where('id',$categoryId)->first();
        return view('edit-category',['category' => $category]);
    }

    /**
     * @param $categoryId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditCategory($categoryId, Request $request){

        $data['name'] = $request->name;
        $img = $request->file('img');

        if ($img) {
            $fileOriginalName = $img->getClientOriginalName();
            $fileExtension = File::extension($fileOriginalName);
            $generatedFileName = str_random(10);
            $fileName = $generatedFileName . '.' . $fileExtension;
            $img->move(public_path() . '/app-files/categories/' . $categoryId, $fileName);
            $data['img'] = $fileName;
        }
        $this->categoryModel->where('id',$categoryId)->update($data);
        return redirect()->action('CategoriesController@category',['id' => $categoryId]);
    }

    public function remove($categoryId)
    {
        $this->categoryModel->where('id',$categoryId)->delete();
        File::deleteDirectory(public_path() . '/app-files/categories/' . $categoryId);
        return redirect()->action('HomeController@index');
    }
}
