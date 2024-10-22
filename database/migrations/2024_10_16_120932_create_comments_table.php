<?php

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Post::class)->constrained();
            $table->foreignIdFor(Profile::class)->constrained();

            $table->text('content');
            $table->string('status');
            $table->unsignedBigInteger('parent_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('comments');
        }
    }
};
