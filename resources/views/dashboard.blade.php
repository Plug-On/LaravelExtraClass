@extends('layouts.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="grid grid-cols-3 gap-10 mt-5">
        <div class="bg-cyan-400 rounded-lg text-white p-5 shadow-lg">
            <h2 class="text-2xl font-bold">Total Packages</h2>
            <p class="text-4xl font-bold text-center">{{$totalpackages}}</p>
        </div>


        <div class="bg-emerald-400 rounded-lg text-white p-5 shadow-lg">
            <h2 class="text-2xl font-bold">Total Notice</h2>
            <p class="text-4xl font-bold text-center">{{$totalnotices}}</p>
        </div>


        <div class="bg-purple-500 rounded-lg text-white p-5 shadow-lg">
            <h2 class="text-2xl font-bold">Total Categories</h2>
            <p class="text-4xl font-bold text-center">{{$totalcategories}}</p>
        </div>

        <div class="bg-rose-600 rounded-lg text-white p-5 shadow-lg">
            <h2 class="text-2xl font-bold">Total Items</h2>
            <p class="text-4xl font-bold text-center">{{$totalitems}}</p>
        </div>

    </div>
@endsection
