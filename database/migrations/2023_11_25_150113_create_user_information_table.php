<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_users_information', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('account_number');
            $table->string('full_name');
            $table->integer('position');
            $table->string('gender');
            $table->string('address');
            $table->date('birthday');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_users_information');
    }
};
