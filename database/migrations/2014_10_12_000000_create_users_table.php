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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('phone')->nullable();
            $table->boolean('is_actif')->default(false);
            $table->boolean('is_bureau')->default(false);
            $table->boolean('is_coach')->default(false);
            $table->boolean('is_benevole')->default(false);
            $table->boolean('is_player')->default(false);
            $table->string('bureau_fonction')->nullable();
            $table->string('picture')->nullable();
            $table->date('birthday')->nullable();
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
        Schema::dropIfExists('users');
    }
};
