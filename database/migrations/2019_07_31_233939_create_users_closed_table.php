<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersClosedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_closed', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('username')->nullable();
          $table->string('last_name')->nullable();
          $table->string('img_perf')->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->boolean('confirmed')->default(0);
          $table->string('confirmation_code')->nullable();
          $table->rememberToken();
          $table->timestamps();
          $table->enum('account_status',['open', 'closed', 'disabled'])->default('open');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_closed');
    }
}
