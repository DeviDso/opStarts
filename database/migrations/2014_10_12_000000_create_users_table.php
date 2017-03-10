<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone_number')->unique();
            $table->string('description')->nullable();
            $table->string('city')->nullable();
            $table->integer('current_status')->nullable();
            $table->string('profile_picture')->default('noimage.png');
            $table->integer('status')->default(0);
            $table->integer('admin')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
