<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;
use App\Gates\AdminGates;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $posts = Post::with('user')->where('user_id', $user->id)->paginate(8);        
        return view('dashboard', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $user = $request->user();
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $user->post()->save($post);
        return redirect()->route('add_post')->with('status', 'Post Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        // return $post;
        return view('single-post', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if(Gate::denies('isAdmin', $post)){
            abort(403);
        }
        return view('edit-post', ['epost'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->user();
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $user->post()->save($post);
        return redirect()->route('dashboard')->with('status', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if(Gate::denies('isAdmin', $post)){
            abort(403);
        }
        $post->delete();
    return redirect()->route('dashboard')->with('status', 'Post Deleted Successfully');
    }
}
