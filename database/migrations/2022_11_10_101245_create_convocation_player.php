<?php

use App\Models\Convocation;
use App\Models\Game;
use App\Models\User;
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
        Schema::create('convocation_player', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class, 'player');
            $table->foreignIdFor(Convocation::class, 'convocation');
            $table->boolean('is_driver')->nullable()->default(null);
            $table->boolean('is_shirt')->nullable()->default(null);
            $table->boolean('is_cleaner')->nullable()->default(null);
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
        Schema::dropIfExists('convocation_player');
    }
};
