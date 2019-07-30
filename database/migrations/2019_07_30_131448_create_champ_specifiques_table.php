<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampSpecifiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champ_specifiques', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->String('libelle_champ');
          $table->integer('slug_champ');
          $table->unsignedBigInteger('formulaire_id');
          $table->foreign('formulaire_id')->references('id')->on('formulaires');
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
        Schema::dropIfExists('champ_specifiques');
    }
}
