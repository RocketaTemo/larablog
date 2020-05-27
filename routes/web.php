<?php

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController')->names('posts');

//< Админка
$groupData = [
    'namespace' =>'Admin',
    'prefix' =>'admin/'
];
Route::group($groupData, function(){
    // Category
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('admin.categories');

    // Post
    Route::resource('posts', 'PostController')
        ->except(['show']) //все методы, кроме show
        ->names('admin.posts');
});
//>

