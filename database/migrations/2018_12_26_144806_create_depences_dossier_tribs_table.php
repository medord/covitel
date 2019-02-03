<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepencesDossierTribsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depences_dossier_tribs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idDossierTrib');
            $table->foreign('idDossierTrib')->references('id')->on('dossier_tribs')->onDelete('cascade');
            $table->unsignedInteger('idEtapeJudic');
            $table->foreign('idEtapeJudic')->references('id')->on('etapes_judic')->onDelete('cascade');
            $table->unsignedInteger('idTarif');
            $table->foreign('idTarif')->references('id')->on('tarifs')->onDelete('cascade');
            $table->boolean('payeDepence');
            $table->string('depencesSuppDossier');
            $table->string('motifDepence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depences_dossier_tribs');
    }
}
