<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(Post $post)
    {
        $this->post = $post;   
    }

    /**
     * Get all the posts.
     *
     * @return View with all the posts for authenticated user.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Form for creating a post.
     *
     * @return View with a blank form.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Form for editing a post.
     *
     * @param  \App\Post  $post
     * 
     * @return View with the populated form.
     */
    public function edit(Post $post)
    {
        if (Auth::user()->cannot('update', $post)) {
            abort(404);
        }
        
        return view('posts.edit', compact('post'));
    }

    /**
     * Storing a new post.
     *
     * @param  App\Http\Requests\StorePostRequest  $request
     * 
     * @return Redirect to index route.
     */
    public function store(StorePostRequest $request)
    {
        if($request->user()->cannot('create', Post::class)){
            abort(403);
        }

        $data = $request->only(['title', 'content', 'published', 'slug', 'description']);
        $validated = $request->validated();
        
        $created = Auth::user()->posts()->create($data);

        if(isset($validated['cover_image'])){
            $created->attachMedia($validated['cover_image']);
        }

        if($created){
            return redirect(route('post.index'))->with('status', 'Post created!');
        }
    }
    
    /**
     * Updating a post.
     *
     * @param  App\Http\Requests\UpdatePostRequest  $request
     * 
     * @return Redirect to index route.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }
        
        $data = $request->only(['title', 'content', 'published', 'slug', 'description']);
        $validated = $request->validated();

        $updated = Post::where('id', $post->id)->update($data);
        if(isset($validated['cover_image'])){
            $post->updateMedia($request->cover_image);
        }
        
        if($updated){
            return redirect(route('post.index'))->with('status', 'Post updated !');
        }
    }

    
    /**
     * API for Post.
     *
     * @param  \Illuminate\Http\Request;  $request
     * 
     * @return Object of populated posts data.
     */
    public function ajax(Request $request)
    {
        return $this->post->dataTable();
    }
}
