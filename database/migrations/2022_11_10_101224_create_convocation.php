<?php

use App\Models\Game;
use App\Models\Category;
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
        Schema::create('convocation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('appointment')->nullable();
            $table->foreignIdFor(Game::class, 'game')->nullable();
            $table->foreignIdFor(Category::class, 'category');
            $table->foreignIdFor(Team::class, 'team');
            $table->boolean('no_game')->default(false);
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('convocation');
    }
};
