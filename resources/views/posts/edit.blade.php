@extends('layouts.app')
@section('title', 'Home')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data"
        class="w-50 m-auto m-5 p-4 shadow">
        @csrf
        @method('patch')
        <h3 class="text-center mb-3">Update Post</h3>
        <div class="mb-3">
            <input type="text" name="title" value="{{ $post->title }}" placeholder="Title....." class="form-control">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
        <div class="mb-3">
            <label for="">Upload Photo</label>
            <input type="file" name="photo" placeholder="Title....." class="form-control">
            <img src="{{ asset("images/$post->photo") }}" alt="photo" width="200">
            <span class="text-danger">{{ $errors->first('photo') }}</span>
        </div>
        <div class="mb-3">
            <input type="text" name="description" value="{{ $post->description }}" placeholder="Description....."
                class="form-control">
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
        <div class="mb-3">
            <input type="submit" value="Update Post" class="btn btn-primary">
        </div>
    </form>
@endsection
