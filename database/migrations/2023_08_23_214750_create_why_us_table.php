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
        Schema::create('why_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('why_us_title');
            $table->text('why_us_content');
            $table->text('why_us_field_1')->nullable();
            $table->text('why_us_field_2')->nullable();
            $table->text('why_us_field_3')->nullable();
            $table->string('why_us_featured_image')->nullable();
            $table->boolean('is_visible')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_us');
    }
};
