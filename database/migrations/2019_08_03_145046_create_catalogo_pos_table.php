<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_pos', function (Blueprint $table) {
            $table->bigIncrements('id');
              $table->string('equipo_futbol')->nullable()->default(NULL);
              $table->string('num_serial')->nullable()->default(NULL);
              $table->string('modelo')->nullable()->default(NULL);
              $table->enum('status',['asignado', 'unsigned', 'disabled'])->default('unsigned');
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
        Schema::dropIfExists('catalogo_pos');
    }
}
