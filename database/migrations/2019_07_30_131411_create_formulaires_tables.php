<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulairesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulaires_tables', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->String('libelle_formulaire');
          $table->unsignedBigInteger('id_type_document');
          $table->foreign('id_type_document')->references('id')->on('type_documents');
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
        Schema::dropIfExists('formulaires_tables');
    }
}
