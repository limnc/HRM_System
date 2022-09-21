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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('nationality');
            $table->string('gender')->nullable();
            $table->string('race')->nullable();;
            $table->date('birthdate')->nullable();;
            $table->string('contactNum')->nullable();
            $table->string('address')->nullable();
            $table->string('marialStat')->nullable();
            $table->string('profilePic')->nullable();
            $table->string('education_level')->nullable();
            $table->string('institution')->nullable();
            $table->string('professional')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
