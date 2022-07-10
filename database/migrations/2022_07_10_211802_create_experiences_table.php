<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('individu');
            $table->date('r_date_debut')->notnull();
            $table->date('r_date_fin')->notnull();
            $table->string('r_libelle_poste')->notnull();
            $table->mediumText('r_description')->notnull();
            $table->timestamps();

            $table->foreign('individu')->references('id')->on('t_individus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_experiences');
    }
}
