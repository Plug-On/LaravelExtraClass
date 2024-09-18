@extends('layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
<form action="{{route('category.store')}}" method="POST" class="mt-5">
    @csrf
    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" value="{{old('priority')}}" placeholder="Priority" name="priority">
    @error('priority')
        <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
    @enderror
    <input type="text" class="block w-full my-5 rounded-lg border-gray-300" value="{{old('name')}}" placeholder="Category name" name="name">
    @error('name')
        <span class="text-red-600 text-sm block -mt-5">{{$message}}</span>
    @enderror
    <div class="flex justify-center gap-3">
    <button class="bg-blue-600 text-white px-3 py-2 rounded-lg">Add Category</button>
    <button class="bg-red-600 text-white px-3 py-2 rounded-lg">Exit</button>
    </div>
</form>
@endsection
