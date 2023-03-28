<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Game
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $date
 * @property string $place
 * @property string $opponent
 * @property int $sch_goals
 * @property int $opponent_goals
 * @property int $team_id
 * @property string $App\Models\GameType
 * @property string $hour
 * @property string $comment
 * @property bool $is_home
 * @property bool $is_finish
 * @property bool|null $is_win
 * @property bool|null $is_lose
 * @property bool|null $is_draw
 * @property int $category
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereApp\Models\GameType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereIsDraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereIsFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereIsHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereIsLose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereIsWin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereOpponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereOpponentGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereSchGoals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUpdatedAt($value)
 * @property \App\Models\Team|null $team
 * @property int $game
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \App\Models\GameType|null $type
 * @method static \Illuminate\Database\Query\Builder|Game onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereGame($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereTeam($value)
 * @method static \Illuminate\Database\Query\Builder|Game withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Game withoutTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereType($value)
 * @mixin \Eloquent
 */
class Game extends Model
{
    use HasFactory;
    protected $table = 'game';
    public $timestamps = true;
    use SoftDeletes;

    public function type()
    {
        return $this->belongsTo(GameType::class, 'type');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team');
    }
}
