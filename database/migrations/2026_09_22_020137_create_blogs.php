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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('judul');
            $table->string('thumbnail');
            $table->text('overview');
            $table->text('pratinjau');
            $table->text('description');
            $table->text('deskripsi');
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->enum('status', ['drafted', 'published', 'trashed']);
            $table->dateTime('publish_date')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')
                ->on('users')
                ->references('id')
                ->nullOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
