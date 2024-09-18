@extends('layouts.app')
@section('title')
    Edit Category
@endsection
@section('content')
<form action="{{route('category.update',$category->id)}}" method="POST" class="mt-5">
    @csrf
    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" value="{{$category->priority}}" placeholder="Priority" name="priority">
    @error('priority')
        <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
    @enderror
    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" value="{{$category->name}}" placeholder="Category name" name="name">
    @error('name')
        <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
    @enderror
    <div class="flex justify-center gap-3">
    <button class="bg-blue-600 text-white px-3 py-2 rounded-lg" >Update Category</button>
    <a href="{{route('category.index')}}" class="bg-red-600 text-white px-3 py-2 rounded-lg">Exit</a>
    </div>
</form>
@endsection

