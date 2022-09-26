<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function forceDelete($post)
    {
        $post = Post::onlyTrashed()->where(array('id' => $post))->forceDelete();
        return redirect()->route('posts.trashed');
    }

    public function restore($post)
    {
        $post = Post::onlyTrashed()->where(array('id' => $post))->first();
        if ($post->trashed()){
            $post->restore();
        }

        return redirect()->route('posts.trashed');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::where('created_at', '>=', date('Y-m-a H:i:s'))->orderBy('title', 'desc')->get();
//        foreach ($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";
//        }

//        $post = Post::where('created_at', '>=', date('Y-m-a H:i:s'))->first();
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

//        $post = Post::where('created_at', '>=', date('Y-m-a H:i:s'))->firstOrFail();
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";
//        echo "<hr>";

//        $post = Post::find(2);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";

//        $post = Post::findOrFail(25);
//        echo "<h1>{$post->title}</h1>";
//        echo "<h2>{$post->subtitle}</h2>";
//        echo "<p>{$post->description}</p>";

//      max - min - sum - count - avg
//        $posts = Post::where('created_at', '>=', date('Y-m-a H:i:s'))->max('title');
//        foreach ($posts as $post){
//            echo "<h1>{$post->title}</h1>";
//            echo "<h2>{$post->subtitle}</h2>";
//            echo "<p>{$post->description}</p>";
//            echo "<hr>";
//        };

        $posts = Post::all();
        return view('posts.index', compact('posts'));
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
//        $post = new Post;
//        $post->title = $request->title;
//        $post->subtitle = $request->subtitle;
//        $post->description = $request->description;
//        $post->save();

        Post::create(array(
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description
        ));

//        $post = Post::firstOrNew(array(
//            'title' => 'Teste2',
//            'subtitle' => 'teste3',
//        ), array(
//            'description' => 'teste2'
//        ));

//        $post = Post::firstOrCreate(array(
//            'title' => 'Teste4',
//            'subtitle' => 'teste4',
//        ), array(
//            'description' => 'teste4'
//        ));

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

//        $posts = Post::where('created_at', '>=', date('Y-m-a H:i:s'))->update(array('description' => 'teste'));

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
//        Post::find($post->id)->delete();
        Post::destroy($post->id);
        return redirect()->back();
    }
}
