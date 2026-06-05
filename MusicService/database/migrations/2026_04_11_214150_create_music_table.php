<?php

use App\Models\Artist;
use App\Models\Genre;
use App\Models\Music;
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
        Schema::create('musics', function (Blueprint $table) {
            $table->id(); 
            $table->string('title');  
            $table->string('description')->nullable();
            $table->string('path');
            $table->text('lyric')->nullable();
            $table->string('cover')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->boolean('active')->default(true);

            $table->foreignIdFor(Artist::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Genre::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->fullText('title');
            $table->fullText('lyric');

            $table->index(['title', 'artist_id', 'genre_id', 'released_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
