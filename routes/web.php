<?php

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
// menggunakan data pada model post
use App\Models\Post;
use App\Models\User;


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

/*
    'posts' => $user->posts artinya kita mengirimkan
     semua post yang dimiliki oleh pengguna (user)
     ke view posts dengan nama variabel posts. 
     Di view, kamu bisa mengaksesnya menggunakan variabel $posts.
     
     posts pada $user->posts merupakan method yg dibuat pada 
     model User

*/ 

Route::get('/authors/{user}', function(User $user) {
    return view('posts', ['title' => 'Article by '. $user->name, 'posts' => $user->posts]);
});

Route::get('/category/{category}', function(Category $category) {
    return view('posts', ['title' => 'Article in '. $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact"]);
});

