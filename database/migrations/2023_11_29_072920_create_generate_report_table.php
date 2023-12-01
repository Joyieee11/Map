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
        Schema::create('tbl_generate_report', function (Blueprint $table) {
            $table->id('report_id');
            $table->string('reporter_name');
            $table->integer('hydrant_id');
            $table->text('before');
            $table->text('during');
            $table->text('after');
            $table->string('status');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_generate_report');
    }
};
