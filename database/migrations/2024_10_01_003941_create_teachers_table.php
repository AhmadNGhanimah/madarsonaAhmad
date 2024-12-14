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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('subscription_number')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('full_name_ar')->nullable();
            $table->string('national_number')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('address')->nullable();
            $table->date('subscription_date')->nullable();
            $table->date('subscription_end_date')->nullable();
            $table->boolean('paid_type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->unsignedBigInteger('sex_id')->nullable();
            $table->unsignedBigInteger('marital_status_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('first_job_title_id')->nullable();
            $table->unsignedBigInteger('second_job_title_id')->nullable();
            $table->unsignedBigInteger('third_job_title_id')->nullable();
            $table->unsignedBigInteger('first_desired_job_city_id')->nullable();
            $table->unsignedBigInteger('second_desired_job_city_id')->nullable();
            $table->unsignedBigInteger('third_desired_job_city_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('practical_experiences_en')->nullable();
            $table->text('practical_experiences_ar')->nullable();
            $table->text('skills_abilities_en')->nullable();
            $table->text('skills_abilities_ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
