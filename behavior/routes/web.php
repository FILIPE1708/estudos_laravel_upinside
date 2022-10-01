<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logs', function (){
//    Log::channel('slack')->info('teste');
    Log::stack(array('slack', 'stack'))->error('teste');
});

Route::get('/session', function (){
//   session('', '')->all();

    session(array(
        'course' => "Laradev"
    ));
    session()->put('name', 'Teste');

//    echo session('student', function (){
//        session()->put('student', 'Teste');
//        return session('student');
//    });

//    echo session()->get('name');

//    session()->push('time', 'aiii');

//    $student = session()->pull('student');
//    echo $student;

//    session()->forget('name');

//    session()->flush();

//   if(session()->has('course')){
//       echo 'O curso selecionado foi: ' . session()->get('course');
//   }
//
//   if(session()->exists('student')){
//       echo 'Esse índice existe';
//   }else{
//       echo 'Esse índice não existe';
//   }

    session()->flash('message', 'O artigo foi adicionado com sucesso');
    session()->reflash();

   var_dump(session()->all());
});


Route::get('/email', function (){
    $user = new stdClass();
    $user->name = 'Filipe Cavalcante';
    $user->email = 'teste@teste.com';

//    return new \App\Mail\welcomeLaraDev($user);
    Mail::send(new \App\Mail\welcomeLaraDev($user));
});
