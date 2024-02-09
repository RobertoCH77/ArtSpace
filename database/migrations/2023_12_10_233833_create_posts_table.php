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

            $table->string('name');
            $table->string('slug');
            $table->text('extract')->nullable();
            $table->longtext('body')->nullable();
            $table->enum('status', [1, 2])->default(1); // solo se puede agregar el valor 1 (borrador) y 2 (publicado)
            $table->unsignedInteger('likes_count')->default(0);

            // Relacionamos con las entidades users y categories
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            // Llaves foreanas
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

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
