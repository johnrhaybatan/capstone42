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
        Schema::create('quarter_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('first_quarter_enabled')->default(false);
            $table->boolean('second_quarter_enabled')->default(false);
            $table->boolean('third_quarter_enabled')->default(false);
            $table->boolean('fourth_quarter_enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quarter_settings');
    }
};
