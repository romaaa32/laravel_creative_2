<?php

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('content')->nullable();
            $table->string('slug');
            $table->unsignedSmallInteger('views')->default(0);

            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(Profile::class)->constrained();

            $table->dateTime('published_at')->nullable();
            $table->boolean('is_active')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('posts');
        }
    }
};
