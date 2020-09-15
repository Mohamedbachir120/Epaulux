<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modeles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('prix_unitaire')->nullable();
            $table->integer('prix_ugros')->nullable();
            $table->integer('paire')->nullable();
            $table->integer('prix_gros')->nullable();
            $table->integer('prix_fardeau')->nullable();
            $table->integer('prix_paquets')->nullable();
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
        Schema::dropIfExists('modeles');
    }
}
