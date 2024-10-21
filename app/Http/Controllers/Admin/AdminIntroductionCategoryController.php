<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IntroductionCategoriesRequest;
use App\Models\IntroductionCategory;
use App\Models\Website;
use Illuminate\Http\Request;

class AdminIntroductionCategoryController extends Controller
{
    public function index(){
        $introductionCategories = IntroductionCategory::orderBy('id' , 'desc')->get();
        return view('admin.partials.introduction_categories.index' , compact('introductionCategories'));
    }
    public function create(){
        $websites = Website::orderBy('id' , 'desc')->get();
        return view('admin.partials.introduction_categories.create' , compact('websites'));
    }
    public function store(IntroductionCategoriesRequest $request){
         $introductionCategories  = new IntroductionCategory();
         $introductionCategories->name = $request->name;
         $introductionCategories->description = $request->description;
         $introductionCategories->website_id = $request->website_id;
         $introductionCategories->save();
         toastr()->success('Thêm danh mục giới thiệu thành công !');
         return redirect()->route('introduction_categories.index');
    }
    public function edit($id){
        $introductionCategory = IntroductionCategory::findOrFail($id);
        $websites = Website::orderBy('id' , 'desc')->get();
        return view('admin.partials.introduction_categories.edit' , compact('introductionCategory','websites'));
    }
    public function update(IntroductionCategoriesRequest $request , $id){
         $introductionCategory = IntroductionCategory::findOrFail($id);
         $introductionCategory->name = $request->name;
         $introductionCategory->description = $request->description;
         $introductionCategory->website_id = $request->website_id;
         $introductionCategory->save();
         toastr()->success('Cập nhật danh mục giới thiệu thành công !');
         return redirect()->route('introduction_categories.index');
    }
    public function destroy($id){
        $introductionCategory = IntroductionCategory::findOrFail($id);
        $introductionCategory->delete();
        return response(['status' => 'success' , 'message' => 'Xóa danh mục giới thiệu thành công !']);
    }
    


}
