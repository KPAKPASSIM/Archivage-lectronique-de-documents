<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampSpecifiqueFormulaireTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champ_specifique_formulaire_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('champSpecifique_id');
            $table->unsignedBigInteger('formulaire_id');
            $table->foreign('champSpecifique_id')->references('id')->on('champ_specifiques');
            $table->foreign('formulaire_id')->references('id')->on('formulaires_tables');
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
        Schema::dropIfExists('champ_specifique_formulaire_tables');
    }
}
