<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->unsignedBigInteger('idTypeDocument');
            $table->string('idNumber')->unique();
            $table->string('mail');
            $table->string('phone');
            $table->string('mobile');
            $table->string('address');
            $table->string('postulate');

            $table->unsignedBigInteger('idDepartament');
            $table->unsignedBigInteger('idCity');
            $table->unsignedBigInteger('idCompany');
            $table->unsignedBigInteger('idService');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idState');
            
            $table->timestamps();

            /*$table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idCompany')->references('id')->on('companies');
            $table->foreign('idService')->references('id')->on('services');
            $table->foreign('idState')->references('id')->on('states');
            $table->foreign('idTypeDocument')->references('id')->on('typeDocument');
            $table->foreign('idDepartament')->references('id')->on('departaments');
            $table->foreign('idCity')->references('id')->on('cities');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
