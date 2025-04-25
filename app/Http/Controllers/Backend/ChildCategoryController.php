<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

     /**
     * Get Sub Categories
     */

    public function getSubcategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name'],
            'status' => ['required']
        ]); 

        $childCagetory  = new ChildCategory();

        $childCagetory->category_id = $request->category;
        $childCagetory->sub_category_id = $request->sub_category;
        $childCagetory->name = $request->name;
        $childCagetory->slug = Str::slug($request->name);
        $childCagetory->status = $request->status;
        $childCagetory->save();
        
        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();
        return view('admin.child-category.edit', compact('categories', 'childCategory', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required'],
            'sub_category' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name,'.$id],
            'status' => ['required']
        ]); 

        $childCagetory  = ChildCategory::findOrFail($id);

        $childCagetory->category_id = $request->category;
        $childCagetory->sub_category_id = $request->sub_category;
        $childCagetory->name = $request->name;
        $childCagetory->slug = Str::slug($request->name);
        $childCagetory->status = $request->status;
        $childCagetory->save();
        
        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCagetory = ChildCategory::findOrFail($id);
        $childCagetory->delete();
        
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){
        $childCagetory = ChildCategory::findOrFail($request->id);
        $childCagetory->status = $request->status == 'true' ? 1 : 0;
        $childCagetory->save();

        return response(['message' => 'Status has been updated!']);
    }
}
