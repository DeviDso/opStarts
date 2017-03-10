<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('type')->nullable();
            $table->integer('category_id');
            $table->string('name')->nullable();
            $table->integer('company_type')->nullable();
            $table->string('cvr_number')->nullable();
            $table->text('description')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_long')->nullable();
            $table->integer('work_experience')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google')->nullable();
            $table->string('logo')->default('nologo.png');
            $table->string('cover')->default('nocover.png');
            $table->integer('layout')->default(0);
            $table->integer('status')->default(0);
            $table->string('slug')->nullable();
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
        Schema::drop('pages');
    }
}
