<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:60',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        // dd($request->all());

        $post = new Post();

        if ($request->has('image')) {
            $image = $request->image;
            // newimage for generate new name when storage
            $newImage = time() . $image->getClientOriginalName();
            // Move to upload folder in public asset
            $image->move('upload/posts', $newImage);

            $post->image = 'upload/posts/' . $newImage;
        }

        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();


        return redirect()->back()->with('status', 'Created new post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => 'required|60',
            'description' => 'required',
        ]);
        if ($request->has('image')) {
            $image = $request->image;
            // newimage for generate new name when storage
            $newImage = time() . $image->getClientOriginalName();
            // Move to upload folder in public asset
            $image->move('upload/posts/', $newImage);
            $post->image = 'upload/posts/' . $newImage;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $post->delete();
        return redirect()->back();
    }
}
