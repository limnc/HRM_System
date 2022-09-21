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
        Schema::create('job_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unsigned();
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('department')->nullable();
            $table->string('job_title')->nullable();
            $table->string('position')->nullable();
            $table->date('joined_date')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->string('pay_grade');
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
        Schema::dropIfExists('job_details');
    }
};
