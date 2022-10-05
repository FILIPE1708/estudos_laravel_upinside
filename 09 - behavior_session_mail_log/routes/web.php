<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

Route::get('/email-queue', function (){
    $user = new stdClass();
    $user->name = 'Filipe Cavalcante';
    $user->email = 'teste@teste.com';

//    return new \App\Mail\welcomeLaraDev($user);
//    Mail::send(new \App\Mail\welcomeLaraDev($user));

    \App\Jobs\welcomeLaraDev::dispatch($user)->delay(now()->addSeconds(15));
});

Route::get('/files', function (){
    $files = Storage::files();
    $allFiles = Storage::allFiles();

//    Storage::makeDirectory('public/students');

    $directories = Storage::directories();
    $allDirectories = Storage::allDirectories();

//    Storage::makeDirectory('public/course');

//    Storage::deleteDirectory('public/course');

//    Storage::disk('public')->put('teste.txt', 'Criando um arquivo no diretório público');
//    Storage::put('teste-local.txt', 'Criando um arquivo no diretório local');

//    echo Storage::get('teste-local.txt');
//
//    var_dump($files, $allFiles, $directories, $allDirectories);
//    return Storage::download('teste-local.txt');

//    if (Storage::exists('teste-local.txt')){
//        echo 'O arquivo existe';
//    }else{
//        echo 'o arquivo não existe';
//    }

//    echo Storage::size('teste-local.txt');
//    echo Storage::lastModified('teste-local.txt');

//    Storage::prepend('teste-local.txt', 'Curso upinside');
//    Storage::append('teste-local.txt', 'Adicionando conteúdo ao arquivo');

//    Storage::copy('teste-local.txt', 'public/teste-local.txt');
//    Storage::move('teste-local.txt', 'public/teste-local.txt');
    Storage::delete('public/teste-local.txt');
});

Route::resource('/imoveis', PropertyController::class);

Route::get('/teste-middleware', [PropertyController::class, 'middle'])->middleware('testemiddleware:Filipe');
