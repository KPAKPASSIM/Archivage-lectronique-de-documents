<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeDocumentsIdColumnToChampSpecifiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('champ_specifiques', function (Blueprint $table) {
            $table->unsignedBigInteger('type_documents_id');
            $table->foreign('type_documents_id')->references('id')->on('type_documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('champ_specifiques', function (Blueprint $table) {
            $table->dropForeign(['type_documents_id']);
            $table->dropColumn('type_documents_id');
        });
    }
}
