<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */public function up()
{
    Schema::table('destinations', function (Blueprint $table) {
        $table->string('youtube_video')->nullable(); // Add YouTube video URL column
    });
}

public function down()
{
    Schema::table('destinations', function (Blueprint $table) {
        $table->dropColumn('youtube_video'); // Rollback the addition of the column
    });
}
};