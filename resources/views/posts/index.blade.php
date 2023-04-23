@extends('layouts.app')
@section('title', 'Post')
@section('content')
    <h1>Posts List</h1>
    <div class="w-50 m-auto p-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create New Post</a>
    <div class="row g-5  m-0">
        @foreach ($posts as $p)
            <div class="col-lg-4 p-3 col-md-6 col-12 shadow">
                <h3><a href="{{ route('posts.show', $p->id) }}">{{ $p->title }}</a></h3>
                <img src="{{ asset("images/$p->photo") }}" class="img-fluid" alt="photo">
                <p>{{ $p->description }}</p>
                <a href="{{ route('posts.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $p->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" onclick="return confirm('are you sure?')" value="Delete" class="btn btn-danger">
                </form>
            </div>
        @endforeach
    </div>
    <div class="p-5 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
