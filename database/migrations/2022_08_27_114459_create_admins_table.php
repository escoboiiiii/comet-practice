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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->unsignedInteger('role_id')->default(3);
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('text')->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('p_email')->nullable();
            $table->string('cell')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('trash')->default(false);
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
        Schema::dropIfExists('admins');
    }
};
