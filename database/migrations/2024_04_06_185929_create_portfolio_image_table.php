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
        Schema::create('portfolio_image', function (Blueprint $table) {
            $table->id();
            $table->integer('port_id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->string('meta_title');
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_image');
    }
};
