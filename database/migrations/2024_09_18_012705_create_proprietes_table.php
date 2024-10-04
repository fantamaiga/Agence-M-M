<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proprietes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('type');
            $table->longText('description');
            $table->integer('surface');
            $table->integer('nombre_chambres');
            $table->integer('nombre_pieces');
            $table->integer('num_etage');
            $table->integer('prix');
          //  $table->unsignedBigInteger('ville_id');
         //   $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
           $table-> string ('ville');
         $table->string('quartier');
            $table->boolean('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietes');
    }
};
