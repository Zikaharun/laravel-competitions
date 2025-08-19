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
        Schema::table('competition_divisions', function (Blueprint $table) {
            //
            $table->uuid('competition_id')->after('user_id');
            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competition_divisions', function (Blueprint $table) {
            //

    
            $table->dropForeign(['competition_id']);
        });
    }
};
