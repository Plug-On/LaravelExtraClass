<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('priority')->get();
        return view('category.index',compact('categories'));
    }

    public function create()
    {
        return view('category.create');
   }

   public function store(Request $request)
   {
        // dd($request->all());
        $data = $request->validate([
            'priority' =>'required|integer',
            'name' => 'required'
        ]);
        Category::create($data);
        return redirect(route('category.index'))->with('success','Category Created Successfully');
   }

   public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('category.edit',compact('category'));
}

public function update(Request $request,$id){
    $data =$request->validate([
    'priority'=>'required|integer',
    'name' => 'required'
]);
    $category = Category::findOrFail($id);
    $category->update($data);
    return redirect(route('category.index'))->with('success','Category Updated Successfully');
}

public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect(route('category.index'))->with('success','Category Deleted Successfully');
}
}




