<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('gender');
            $table->string('avatar')->nullable();
            $table->date('birthed_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('profiles');
        }
    }
};
