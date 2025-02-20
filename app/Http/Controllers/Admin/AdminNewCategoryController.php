<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AdminNewCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = NewsCategory::select(['id', 'name']);
            return DataTables::of($categories)
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-danger delete-category" data-id="' . $row->id . '">Xóa</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.partials.news_categories.index');
    }
    public function create()
    {
        return view('admin.partials.news_categories.create');
    }
    public function store(Request $request)
    {
        $category = NewsCategory::create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }
    public function edit($id)
    {
        $newCategory = NewsCategory::findOrFail($id);
        return view('admin.partials.news_categories.edit', compact('newCategory'));
    }
    public function update(Request $request, $id)
    {
        Log::info($request->all());
        $request->validate(
            [
                'name' => 'required|min:3|max:20'
            ],
            __('request.messages'),
            ['name' => 'Tên danh mục tin tức']
        );
        $newCategory = NewsCategory::findOrFail($id);
        $newCategory->name = $request->name;
        $newCategory->save();
        return response()->json([
            'success' => true
        ]);
    }
    public function destroy($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
