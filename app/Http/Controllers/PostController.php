<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(6);
        Paginator::useBootstrap();
        // return $posts;
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required',
            'photo' => 'required|mimes:png,jpg,svg,webp,jpeg'
        ]);
        $post = $request->all();
        if ($img = $request->file('photo')) {
            $path = "images/";
            $ext = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($path, $ext);
            $post['photo'] = $ext;
        }
        Post::create($post);
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();
        return redirect()->route('posts.index')->with('success', "Create new Post success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required',
            // 'photo' => 'required|mimes:png,jpg,svg,webp,jpeg'
        ]);
        $data = $request->all();
        if ($img = $request->file('photo')) {
            $path = "images/";
            $ext = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($path, $ext);
            $data['photo'] = $ext;
        } else {
            unset($data['photo']);
        }
        $post->update($data);
        return redirect()->route('posts.index')->with('success', "Update Post success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', "delete success");
    }
}
