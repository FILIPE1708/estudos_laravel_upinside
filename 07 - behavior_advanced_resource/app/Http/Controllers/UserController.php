<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = User::find($id);
        echo "<h1>Dados do usuário</h1>";
        echo "Nome do usuário: {$user->name}<br>";
        echo "Email do usuário: {$user->email}<br>";

        $userAddress = $user->addressDelivery()->get()->first();
        if ($userAddress){
            echo "<h1>Endereço de entrega</h1>";
            echo "Endereço: {$userAddress->address}, {$userAddress->number}<br>";
            echo "Complemento: {$userAddress->complement}, CEP: {$userAddress->zipcode}<br>";
            echo "Cidade/Estado: {$userAddress->city}/{$userAddress->state}<br>";
        }

//        $addressTest = new Address(array(
//            'address' => 'Rua dos bobos',
//            'number'=> '0',
//            'complement' => 'Apto 123',
//            'zipcode' => '88000-000',
//            'city' => 'Floripa',
//            'state' => 'SC'
//        ));

        $address = new Address();
        $address->address = 'Rua 1';
        $address->number = '22';
        $address->complement = 'Ap 23';
        $address->zipcode = '57700-000';
        $address->city = 'Viçosa';
        $address->state = 'AL';

//        $user->addressDelivery()->save($address);
//        $user->addressDelivery()->saveMany(array($address, $addressTest));

//        $user->addressDelivery()->create(array(
//            'address' => 'Rua dos bobos desgraça',
//            'number'=> '0',
//            'complement' => 'Apto 123',
//            'zipcode' => '88000-000',
//            'city' => 'Floripa',
//            'state' => 'SC'
//        ));

//        $user->addressDelivery()->createMany(array(
//            array(
//                'address' => 'Rua dos bobos desgraça',
//                'number'=> '0',
//                'complement' => 'Apto 123',
//                'zipcode' => '88000-000',
//                'city' => 'Floripa',
//                'state' => 'SC'
//            ),
//
//            array(
//                'address' => 'Rua dos bobos desgraça da desgraça',
//                'number'=> '0',
//                'complement' => 'Apto 123',
//                'zipcode' => '88000-000',
//                'city' => 'Floripa',
//                'state' => 'SC'
//            )
//        ));

//        $users = User::with('addressDelivery')->get();
//        dd($users);

        $posts = $user->posts()->orderBy('id', 'DESC')->take(5)->get();
        if ($posts){
            echo "<h1>Artigos</h1>";
            foreach ($posts as $post){
                echo "#{$post->id} Título: {$post->title}<br>";
                echo "Subtitulo: {$post->subtitle}<br>";
                echo "Descrição: {$post->description}<br>";
                echo "<hr><br>";
            }
        }

//        $comments = $user->commentsOnMyPost()->get();
//        if ($comments){
//            echo "<h1>Comentários</h1>";
//            foreach ($comments as $comment){
//                echo "Usuário: {$comment->user}<br>";
//                echo "Post: {$comment->post}<br>";
//                echo "Conteúdo: {$comment->content}<br>";
//                echo "<hr><br>";
//            }
//        }

//        $user->comments()->create(array(
//            'content' => 'Comentário 123'
//        ));

            $comments = $user->comments()->get();
        if ($comments){
            echo "<h1>Comentários</h1>";
            foreach ($comments as $comment){
                echo "#{$comment->id} Comentário: {$comment->content}<br>";
                echo "<hr><br>";
            }
        }

        $students = User::students()->get();
        if ($students){
            echo "<h1>Alunos</h1>";
            foreach ($students as $student){
                echo "Nome do usuário: {$student->name}<br>";
                echo "Email do usuário: {$student->email}<br>";
            }
        }

        $admins = User::admins()->get();
        if ($admins){
            echo "<h1>Administradores</h1>";
            foreach ($admins as $admin){
                echo "Nome do usuário: {$admin->name}<br>";
                echo "Email do usuário: {$admin->email}<br>";
            }
        }

        $users = User::all();
        var_dump($users->makeVisible('created_at')->toArray());
        var_dump($users->makeHidden('created_at')->toJson(JSON_PRETTY_PRINT));
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
