@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="w-50 m-auto m-5 p-4 shadow">
        @csrf
        <h3 class="text-center mb-3">Create New Post</h3>
        <div class="mb-3">
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Title....." class="form-control">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
        <div class="mb-3">
            <label for="">Upload Photo</label>
            <input type="file" name="photo" placeholder="Title....." class="form-control">
            <span class="text-danger">{{ $errors->first('photo') }}</span>
        </div>
        <div class="mb-3">
            <input type="text" name="description" value="{{ old('description') }}" placeholder="Description....."
                class="form-control">
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
        <div class="mb-3">
            <input type="submit" value="Create Post" class="btn btn-primary">
        </div>
    </form>
@endsection
