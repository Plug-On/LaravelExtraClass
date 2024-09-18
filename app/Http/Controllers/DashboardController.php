<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Notice;
use App\Models\package;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalcategories  = Category::count();
        $totalnotices = Notice::count();
        $totalpackages = package::count();
        $totalitems = Item::count();
        return view('dashboard',compact('totalpackages','totalcategories','totalnotices','totalitems'));
    }
}
