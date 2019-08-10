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
            $table->string('username',15)->unique();
            $table->string('wallet_qr')->unique();
            $table->string('last_name')->nullable();
            $table->date('fech_nac')->nullable();
            $table->string('img_perf')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('phone_work')->nullable()->default(NULL);
            $table->string('phone_local')->nullable()->default(NULL);
            $table->string('img_doc')->nullable();
            $table->string('num_doc')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->enum('account_status',['open', 'closed', 'disabled'])->default('open');
            //$table->boolean('verify')->default(FALSE);
            $table->enum('verify',['Verificado', 'En proceso', 'Rechazado' ,'Por verificar'])->default('Por verificar');



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
