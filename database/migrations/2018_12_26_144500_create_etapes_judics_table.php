<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapesJudicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapes_judic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codeEtape');
            $table->string('libelleEtape');
            $table->boolean('demandeFond');
            $table->string('commentEtape');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapes_judics');
    }
}
