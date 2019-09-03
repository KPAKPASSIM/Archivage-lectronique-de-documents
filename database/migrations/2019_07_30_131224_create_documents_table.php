<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->date('date_archivage');
          $table->string('date_document');
          $table->String('reference');
          $table->String('nom_auteur');
          $table->string('adresse_auteur');
          $table->string('statut_document');
          $table->text('attribut_additionnel');
          $table->unsignedBigInteger('type_document_id');
          $table->unsignedBigInteger('user_id');
          $table->foreign('type_document_id')->references('id')->on('type_documents');
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('documents');
    }
}
