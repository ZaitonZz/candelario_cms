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
        Schema::create('nav_bars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('section_one_text');
            $table->string('section_one_link');
            $table->string('section_two_text');
            $table->string('section_two_link');
            $table->string('section_three_text');
            $table->string('section_three_link');
            $table->string('section_four_text');
            $table->string('section_four_link');
            $table->string('section_five_text');
            $table->string('section_five_link');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_bars');
    }
};
