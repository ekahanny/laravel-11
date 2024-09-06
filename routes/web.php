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

Route::get('/posts/{slug}', function($slug) {
    // Mencari elemen pertama dalam array posts yang memiliki slug yg sama
    $post = Post::find($slug);
    return view('post', ['title' => 'Detail Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact"]);
});

