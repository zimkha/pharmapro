<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandearticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandearticles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qte_commande');
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('bon_commande_id');
            $table->float('prix_ht')->nullable();
            $table->float('prix_TTC')->nullable();
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
        Schema::dropIfExists('commandearticles');
    }
}
