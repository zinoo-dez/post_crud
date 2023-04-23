@extends('layouts.app')
@section('title', 'Post')
@section('content')
    <h1>Posts List</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create New Post</a>
    <div class="row g-3 m-0">
        @foreach ($posts as $p)
            <div class="col-lg-4 col-md-6 col-12 shadow">
                <h3><a href="{{ route('posts.show', $p->id) }}">{{ $p->title }}</a></h3>
                <img src="{{ asset("images/$p->photo") }}" alt="photo">
                <p>{{ $p->description }}</p>
                <a href="{{ route('posts.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $p->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
        @endforeach
    </div>
@endsection
