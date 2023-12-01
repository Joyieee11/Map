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
        Schema::create('tbl_hydrantInfo', function (Blueprint $table) {
            $table->id('hydrant_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('location');
            $table->string('pipe_type');
            $table->string('color');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hydrantInfo');
    }
};
