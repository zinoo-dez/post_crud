@extends('layouts.app')
@section('title', 'Post')
@section('content')
    <h1>Detilas Post</h1>
    <div class="text-center p-5 shadow">
        <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
        <img src="{{ asset("images/$post->photo") }}" class="img-fluid" alt="photo">
        <p>{{ $post->description }}</p>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <input type="submit" onclick="return confirm('are you sure?')" value="Delete" class="btn btn-danger">
        </form>
    </div>

@endsection
