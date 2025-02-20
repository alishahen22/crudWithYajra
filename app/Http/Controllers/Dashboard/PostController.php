<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Dashboard\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostDataTable $dataTable)
    {
        return $dataTable->render('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('posts', 'public');

        Post::create($data);
        return redirect()->route('dashboard.posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
            //delete old image
            Storage::delete($post->image);
        }
        $post->update($data);
        return redirect()->route('dashboard.posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Storage::delete($post->image);
        return redirect()->route('dashboard.posts.index')->with('success', 'Post deleted successfully');
    }
}
