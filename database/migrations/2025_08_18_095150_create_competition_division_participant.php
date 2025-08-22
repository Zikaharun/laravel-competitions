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
        Schema::create('competition_division_participant', function (Blueprint $table) {
            $table->id();
            $table->uuid('competition_division_id');
            $table->uuid('participant_id');
            $table->timestamps();

            $table->foreign('competition_division_id')->references('id')->on('competition_divisions')->cascadeOnDelete();
            $table->foreign('participant_id')->references('id')->on('participants')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_division_participant');
    }
};
