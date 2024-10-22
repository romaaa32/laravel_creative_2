<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Post::class)->constrained();
            $table->foreignIdFor(Tag::class)->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('post_tag');
        }
    }
};