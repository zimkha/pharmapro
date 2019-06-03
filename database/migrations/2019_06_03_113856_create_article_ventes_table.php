<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_ventes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qte_vendu');
            $table->integer('remise')->nullable();
            $table->integer('montant_total');
            $table->unsignedInteger('vente_id');
            $table->unsignedInteger('lot_id');
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
        Schema::dropIfExists('article_ventes');
    }
}
