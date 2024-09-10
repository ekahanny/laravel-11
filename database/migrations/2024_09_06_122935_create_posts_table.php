<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // akan berelasi dgn tabel user sehingga disesuaikan dengan tipe data id pada tabel user
            // $table->unsignedBigInteger('author_id');
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();

            // mendeklarasikan relasi antar tabel posts dengan table user
            // $table->foreign('author_id')->references('id')->on('user');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_author_id'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
