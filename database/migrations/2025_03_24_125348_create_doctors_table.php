<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('phone');
            $table->string('specialization');
            $table->integer('experience');
            $table->string('qualification');
            $table->text('bio')->nullable();
            $table->string('profile_image')->nullable();
            $table->json('availability')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('doctors');
    }
};
