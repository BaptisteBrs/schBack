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
        Schema::create('pef', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->dateTime('publication');
            $table->date('date');
            $table->date('begin')->nullable();
            $table->date('end')->nullable();
            $table->string('description',10000)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pef');
    }
};
