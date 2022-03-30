<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumb');
            $table->string('period_date');
            $table->string('period_time');
            $table->string('old_price');
            $table->string('price');
            $table->string('time');
            $table->string('length_lessons');
            $table->string('limit_users');
            $table->string('course_type');
            $table->string('course_video');
            $table->string('course_program');
            $table->foreignId('lead_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
