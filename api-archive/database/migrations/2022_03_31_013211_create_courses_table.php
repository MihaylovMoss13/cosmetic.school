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
            $table->string('title');
            $table->string('slug');
            $table->foreignId('category_id')->constrained();
            $table->text('course_description');
            $table->string('course_duration');
            $table->string('course_price');
            $table->string('course_old_price');
            $table->string('course_credit_info');
            $table->string('course_medicine_info');
            $table->string('course_thumb');
            $table->string('course_video');
            $table->string('advantages');
            $table->text('course_program');
            $table->string('course_program_pdf');
            $table->string('course_contract_url');
            $table->string('limit_users');
            $table->string('course_type');

            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
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
