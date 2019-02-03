<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossierClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idClient');
            $table->foreign('idClient')->references('id')->on('clients')->onDelete('cascade');;
            $table->date('dateDossier');
            $table->string('typeDossier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossier_clients');
    }
}
