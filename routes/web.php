<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// -->> Route for authantication
Auth::routes();

// -->> Route for home
Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

// -->> Route resource for posts
Route::resource('posts', "PostController")->parameters([
    "posts" => 'post'
])->names([
    'index' => 'posts.index',
    'create' => 'post.create',
    'store' => 'post.store',
    'show' => 'post.show',
    'edit' => 'post.edit',
    'update' => 'post.update',
    'destroy' => 'post.destroy',
]);

// -->> Route resource for comments
Route::resource('comments', "CommentController")->except([
    'show',

])->parameters([
    "comments" => 'comment'
])->names([
    'index' => 'comments.index',
    'create' => 'comment.create',
    'store' => 'comment.store',
    'edit' => 'comment.edit',
    'update' => 'comment.update',
    'destroy' => 'comment.destroy',
]);

// -->> Route resource for Contact us
Route::resource('contacts', "ContactController")->only([
    'index', 'store'

])->parameters([
    "contacts" => 'contact'
])->names([
    'index' => 'contacts.index',
    'store' => 'contact.store',
]);

// -->> Route resource for profile user
Route::resource('profile', 'ProfileController')->only([
    'index', 'update'
])->parameters([
    'profile' => 'profile'
])->names([
    'index' => 'dashboard.index',
    'update' => 'profile.update'
]);

// -->> Setting Route for get profile setting page
Route::get('setting', 'ProfileController@setting')->name('profile.setting');
