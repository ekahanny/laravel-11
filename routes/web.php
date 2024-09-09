<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
// menggunakan data pada model post
use App\Models\Post;

// mengirim title page
Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ["title" => "About"]);
});

Route::get('/posts', function () {
    return view('posts', ["title" => "Blog", "posts" => Post::all()] );
});

/*
    menggunakan route model binding,
    mengirim seluruh instance dari 
    model Posts yang sesuai dengan
    field slug yang akan dicari/diklik.

*/
Route::get('/posts/{post:slug}', function(Post $post) {
    return view('post', ['title' => 'Detail Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact"]);
});

