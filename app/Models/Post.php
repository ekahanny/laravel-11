<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

// Eloquent 
class Post extends Model
{
    use HasFactory;
    /* 
        Default dari nama tabel adalah bentuk jamak dari nama 
        classnya (dalam case ini default tabel adalah posts). 
        Kemudian, utk mengganti nama table sesuai yg diinginkan,
        gunakan sintaks dibawah ini:
    */ 
    protected $table = 'blog_posts';

    // hanya field ini yg boleh diisi
    protected $fillable = ['title', 'author', 'slug', 'body'];
}
