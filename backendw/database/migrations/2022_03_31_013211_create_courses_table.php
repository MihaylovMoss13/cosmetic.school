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
            $table->string('slug')->unique()->nullable();
            $table->foreignId('category_id')->constrained();
            $table->text('description');
            $table->string('duration');
            $table->string('price');
            $table->string('old_price')->nullable();
            $table->string('credit_info');
            $table->string('medicine_info');
            $table->string('thumb')->nullable();
            $table->string('video')->nullable();
            $table->string('advantages')->nullable();
            $table->text('program');
            $table->string('program_pdf')->nullable();
            $table->string('contract_url')->nullable();
            $table->string('limit_users')->nullable();
            $table->string('type');

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
