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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('uname')->nullable();
            $table->string('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('presentadd')->nullable();
            $table->string('permanentadd')->nullable();
            $table->string('mobile')->nullable();
            $table->string('emergencyContact')->nullable();
            $table->string('profileImg')->nullable();
            $table->text('socialId')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
