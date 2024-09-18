@extends('layouts.app')
@section('title')
    Create Package
@endsection

@section('content')

<form action="{{route('packages.store')}}" method="POST" class="mt-5" >
    @csrf
    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Package Name" name="name" value="{{old('name')}}">
    @error('name')
    <span class="text-red-600 text-sm block -mt-5">{{($message)}}</span>
    @enderror

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Enter Price" name="price" value="{{old('rate')}}">
    @error('price')
    <span class="text-red-600 text-sm block -mt-5">{{($message)}}</span>
    @enderror

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Enter Capacity (No of People)" name="price" value="{{old('capacity')}}">
    @error('capacity')
    <span class="text-red-600 text-sm block -mt-5">{{($message)}}</span>
    @enderror

    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" placeholder="Enter Description" name="description" value="{{old('rate')}}">
    @error('description')
    <span class="text-red-600 text-sm block -mt-5">{{($message)}}</span>
    @enderror

    <!-- <select name="status" id="" class="block w-full my-5 rounded-lg border-gray-300">
        <option value="Show">Show</option>
        <option value="Hide">Hide</option>
    </select> -->

    <div class="flex justify-center gap-3">
        <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-lg">Add Package</button>
        <a href="{{route('packages.index')}}" class="bg-red-600 text-white px-3 py-2 rounded-lg">Exit</a>

    </div>
</form>

@endsection
