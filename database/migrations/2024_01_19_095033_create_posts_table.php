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
            $table->string('file');
            $table->string('file_original_name');
            $table->decimal('amount');
            $table->string('title');
            $table->enum('scope', ['small', 'medium', 'large']);
            $table->enum('duration', ['1', '3', '6']);
            $table->enum('experience', ['0', '1', '2']);
            $table->boolean('is_full_time');
            $table->boolean('budget_type');
            $table->string('description');
            $table->timestamps();
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
