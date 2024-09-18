<?php

namespace App\Http\Controllers;

use App\Models\package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = package::all();
        return view('packages.index',compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'capacity'=>'required',
            'description' => 'required'
        ]);

    package::create($data);
    return redirect(route('packages.index'))->with('success','Package Created Successfully');
    }

    public function edit($id)
    {
        $packages = package::find($id);
        return view('packages.edit',compact('packages'));
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name'=>'required',
            'price' => 'required|integer',
            'capacity'=>'required',
            'description' => 'required'
        ]);

        $packages = package::find($id);
        $packages->update($data);
        return redirect(route('packages.index'))->with('success','Package Updated Successfully');
    }

    public function destroy($id)
    {
        $packages = package::find($id);
        $packages->delete();
        return redirect(route('packages.index'))->with('success','Package Deleted Successfully');
    }
}
