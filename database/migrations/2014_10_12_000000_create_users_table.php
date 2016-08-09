<?php

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
            $table->string('name' , 100);
            $table->string('email',150)->unique()->index();
            $table->string('password',100);
            $table->boolean('active')->nullable()->default(1);
            $table->boolean('trial')->nullable()->default(1);
            $table->enum('account', ['FREE', 'PREMIUM']);
            $table->string('valid_token', 100)->nullable()->index();
            $table->boolean('verified')->nullable()->default(0);
            $table->rememberToken()->index();
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
