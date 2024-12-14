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
        Schema::create('teacher_educational_qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('specialization_id')->nullable();
            $table->string('institute')->nullable();
            $table->string('city')->nullable();
            $table->string('graduation_date')->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_educational_qualifications');
    }
};
