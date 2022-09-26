<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::resourceVerbs([
    'create' => 'cadastro',
    'edit' => 'editar'
]);

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

//Route::view('/form', 'form');
//
////GET
//Route::get('/users/1', [UserController::class, 'index']);
//Route::get('/getData', [UserController::class, 'getData']);
//
////POST
//Route::post('/postData', [UserController::class, 'postData']);
//
////PUT
//Route::put('/users/1', [UserController::class, 'testPut']);
//
////PATCH
//Route::patch('/users/1', [UserController::class, 'testPatch']);
//
////Match de PUT e PATCH
//Route::match(['PUT', 'PATCH'], '/users/2', [UserController::class, 'testMatch']);
//
////DELETE
//Route::delete('/users/1', [UserController::class, 'destroy']);
//
////Any
//Route::any('/users', [UserController::class, 'any']);

//Route::get('posts/premium', [PostController::class, 'premium']);
//Route::resource('posts', PostController::class)->only(['index', 'show']);
//Route::resource('posts', PostController::class)->except(['destroy']);
//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/users', [UserController::class, 'show']);

//Route::get('/users', function (){
//    echo 'Listagem de usuários da minha base';
//});
//
//Route::fallback(function (){
//    echo '<h1>Ooops, parece que deu merda em, você veio parar ná 404</h1>';
//});
//
//Route::redirect('/users/add', url('/form'), 301);
//
//Route::get('/posts/index', [PostController::class, 'indexRedirect'])->name('posts.indexRedirect');

//Route::get('/users/{id}/comments/{comment}', function ($id, $comment){
//    var_dump($id, $comment);
//});

//Route::get('/users/{id}/comments/{comment?}', function ($id, $comment = null){
//    var_dump($id, $comment);
//})->where('id', '[0-9]+');
//
//Route::get('/users/{id}/comments/{comment?}', function ($id, $comment = null){
//    var_dump($id, $comment);
//})->where(array('id' => '[0-9]+', 'comment' => '[a-zA-Z]+'));

//Route::get('/users/{id}/comments', function ($id){
//    var_dump($id);
//});

//Route::get('/users/{id}/comments/{comment?}', [UserController::class, 'userComments'])->where(array('id' => '[0-9]+', 'comment' => '[a-zA-Z]+'));


//Route::get('users/1', [UserController::class, 'inspect'])->name('inspect');

//Route::prefix('admin')->group(function (){
//    Route::view('/form', 'form');
//});
//
//Route::name('admin.posts.')->group(function (){
//    Route::get('/admin/posts/index', [PostController::class, 'index'])->name('index');
//    Route::get('/admin/posts', [PostController::class, 'show'])->name('show');
//});
//
//Route::middleware(array('throttle:10,1'))->group(function (){
//    Route::view('/form', 'form');
//});
//
//Route::namespace('App\Http\Controllers\Admin')->group(function (){
//    Route::get('/users', 'UserController@index');
//});

Route::group(array('namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['throttle:10,1'], 'as' => 'admin.'), function (){
    Route::resource('/users', 'UserController');
});
