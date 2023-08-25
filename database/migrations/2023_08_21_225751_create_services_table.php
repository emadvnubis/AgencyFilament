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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_title');
            $table->text('service_content');
            $table->text('custom_field_1')->nullable();
            $table->text('custom_field_2')->nullable();
            $table->text('custom_field_3')->nullable();
            $table->string('service_image')->nullable();
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
        Schema::dropIfExists('services');
    }
};
