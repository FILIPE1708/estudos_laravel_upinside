<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        echo "#{$post->id} Título: {$post->title}<br>";
        echo "Subtitulo: {$post->subtitle}<br>";
        echo "Descrição: {$post->description}<br>";
        echo "Data de criação: {$post->createdFmt}<br>";
        echo "<hr><br>";

//        $post->title = 'Título do meu artigo!';
//        $post->save();

        $postAuthor = $post->author()->get()->first();

        if ($postAuthor){
            echo "<h1>Dados do usuário</h1>";
            echo "Nome do usuário: {$postAuthor->name}<br>";
            echo "Email do usuário: {$postAuthor->email}<br>";
        }

        $postsCategory = $post->categories()->get();
        if ($postsCategory){
            echo "<h1>Categorias</h1>";
            foreach ($postsCategory as $postCategory){
                echo "#{$postCategory->id} Categoria: {$postCategory->name}<br>";
                echo "<hr><br>";
            }
        }

//        $post->categories()->attach(array(3));
//        $post->categories()->detach(array(3));
//        $post->categories()->sync(array(3, 7));
//        $post->categories()->syncWithoutDetaching(array(3, 7, 10));

//        $post->comments()->create(array(
//            'content' => 'Comentário 123'
//        ));

        $comments = $post->comments()->get();
        if ($comments){
            echo "<h1>Comentários</h1>";
            foreach ($comments as $comment){
                echo "#{$comment->id} Comentário: {$comment->content}<br>";
                echo "<hr><br>";
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
