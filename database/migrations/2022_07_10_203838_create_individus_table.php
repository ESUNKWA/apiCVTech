<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_individus', function (Blueprint $table) {
            $table->id();
            $table->string('r_nom', 35)->notnull();
            $table->string('r_prenoms', 35)->notnull();
            $table->date('r_date_naissance')->nullable();
            $table->mediumText('r_description');
            $table->string('r_photo',255)->nullable();
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
        Schema::dropIfExists('t_individus');
    }
}
