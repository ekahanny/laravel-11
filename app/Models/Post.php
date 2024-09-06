<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post
{
    use HasFactory;
    public static function all(){
        return [
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
    }

    public static function find($slug): array {
        // menggunakan static krn method all dan find berada pada 1 class yg sama
        $post = Arr::first(static::all(), function($post) use ($slug) {
            return $post['slug'] == $slug;
        });

        // create 404 page instead of throw an laravel's error page
        if(!$post){
            abort(404);
        }

        return $post;
        
    }
}
