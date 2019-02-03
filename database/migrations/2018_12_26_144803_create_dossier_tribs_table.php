<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossierTribsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_tribs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idDossierClient');
            $table->foreign('idDossierClient')->references('id')->on('dossier_clients')->onDelete('cascade');
            $table->text('adversaires');
            $table->text('contrats');
            $table->float('creanceProc');
            $table->unsignedInteger('idProc');
            $table->foreign('idProc')->references('id')->on('procedures_judics')->onDelete('cascade');
            $table->unsignedInteger('idAgent');
            $table->foreign('idAgent')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('status');
            $table->foreign('status')->references('id')->on('etapes_judic')->onDelete('cascade');
            $table->unsignedInteger('idTribunal');
            $table->foreign('idTribunal')->references('id')->on('tribunals')->onDelete('cascade');;
            $table->string('commentaireDossier');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossier_tribs');
    }
}
