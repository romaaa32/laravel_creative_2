<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends migration {
    public function up(): void
    {
        schema::create('roles', function (blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (app::islocal()) {
            schema::dropifexists('roles');
        }
    }
};
