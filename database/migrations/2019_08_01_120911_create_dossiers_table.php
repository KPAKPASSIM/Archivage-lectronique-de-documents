<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->timestamps();
        });
        Schema::table('documents', function(Blueprint $table) {
            $table->unsignedInteger('dossiers_id');
            $table->foreign('dossiers_id')->references('id')->on('dossiers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table){
            $table->dropForeign(['dossiers_id']);
            $table->dropColumn('dossiers_id');
        });
        Schema::dropIfExists('dossiers');
    }
}
