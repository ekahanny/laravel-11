<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
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
    // protected $table = 'blog_posts';

    // hanya field ini yg boleh diisi
    protected $fillable = ['title', 'author', 'slug', 'body'];

    // resolve N+1 problem
    protected $with = ['author', 'category'];

    // Menghubungkan tabel post dgn tabel user
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
