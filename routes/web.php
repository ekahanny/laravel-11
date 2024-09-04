<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// mengirim title page
Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});

Route::get('/about', function () {
    return view('about', ["title" => "About"]);
});

Route::get('/posts', function () {
    return view('posts', ["title" => "Blog", "posts" => [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Eka Hanny',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem dolores eum quam sunt laudantium quidem pariatur repellat, suscipit rerum molestias ad perferendis perspiciatis reiciendis magnam. Facilis totam nam cumque soluta.'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Eka Hanny',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi laborum magni fuga alias qui? Ipsam, ratione dolorum. Repellendus, libero iure inventore a iusto voluptatum quidem. Architecto voluptates quasi dolores distinctio.'
        ],
    ]] );
});

Route::get('/posts/{slug}', function($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Eka Hanny',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem dolores eum quam sunt laudantium quidem pariatur repellat, suscipit rerum molestias ad perferendis perspiciatis reiciendis magnam. Facilis totam nam cumque soluta.'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Eka Hanny',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi laborum magni fuga alias qui? Ipsam, ratione dolorum. Repellendus, libero iure inventore a iusto voluptatum quidem. Architecto voluptates quasi dolores distinctio.'
        ],
    ];

    // Menemukan elemen pertama dalam array posts yang memiliki slug yg sama
    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Detail Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact"]);
});

