<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phototeque', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('sous_titre');
            $table->date('date');
            $table->string('image_couverture')->nullable(); // path de l'image
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
        Schema::dropIfExists('phototeque');
    }
};
