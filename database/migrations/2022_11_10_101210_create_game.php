<?php

use App\Models\Category;
use App\Models\GameType;
use App\Models\Team;
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
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('place');
            $table->string('opponent');
            $table->integer('sch_goals')->default(0);
            $table->integer('opponent_goals');
            $table->foreignIdFor(Team::class, 'team');
            $table->foreignIdFor(GameType::class, 'type');
            $table->string('hour');
            $table->string('comment')->nullable();
            $table->boolean('is_home')->default(true);
            $table->boolean('is_finish')->default(false);
            $table->boolean('is_win')->default(null)->nullable();
            $table->boolean('is_lose')->default(null)->nullable();
            $table->boolean('is_draw')->default(null)->nullable();
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
        Schema::dropIfExists('game');
    }
};
