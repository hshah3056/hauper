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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact');
            $table->string('profile_image')->nullable();
            $table->string('email_verification')->nullable();
            $table->string('last_logged_in_ip')->nullable();
            $table->tinyInteger('is_admin')->default(1)->comment('1: Yes, 2: No');
            $table->tinyInteger('status')->default(1)->comment('1: Active, 2: InActive');
            $table->dateTime('deleted_at');
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
        Schema::dropIfExists('users');
    }
}
