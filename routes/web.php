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

Route::get('/posts', function () {
    return view('welcome');
});

Route::get('/posts','postscontroller@posts');
Route::get('/posts/{post}','postscontroller@post');
Route::get('/categories/{name}','postscontroller@category');


Route::post('/posts/addpost','postscontroller@addpost');

Route::post('/posts/{post}/addcomment','commentscontroller@addcomment');
//Route::get('/posts/{post}/addcomment','commentscontroller@comment');

//register
Route::get('/register','registrationcontroller@register');
Route::post('/register','registrationcontroller@adduser');

//login
Route::get('/login','logincontroller@login');
Route::post('/login','logincontroller@logincheck');
Route::get('/logout','logincontroller@logout');

Route::get('/adminlogin','admincontroller@login');
Route::POST('/adminlogin','admincontroller@dologin');

Route::get('/admin','postscontroller@admin')->middleware('authadmin:webadmin');
 
Route::get('/statistics','postscontroller@statistics')->middleware('authadmin:webadmin');

Route::get('/admincontrol','admincontroller@admincontrol')->middleware('authadmin:webadmin');
//Route::post('/admincontrol','admincontroller@control');
Route::post('/admincontrol','admincontroller@stopcomments');
