<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Convocation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $appointment
 * @property int $game
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereAppointment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereGame($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $players
 * @property-read int|null $players_count
 * @method static \Illuminate\Database\Query\Builder|Convocation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Convocation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Convocation withoutTrashed()
 * @property string $date
 * @property \App\Models\Category|null $category
 * @property \App\Models\Team|null $team
 * @property bool $no_game
 * @property string|null $comment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ConvocationPlayer> $convocation_players
 * @property-read int|null $convocation_players_count
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereNoGame($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Convocation whereTeam($value)
 * @property boolean|null $is_cacher
 * @property int|null $responsable_id
 * @mixin \Eloquent
 */
class Convocation extends Model
{
    use HasFactory;
    protected $table = 'convocation';
    public $timestamps = true;
    use SoftDeletes;

    public function convocation_players()
    {
        return $this->hasMany(ConvocationPlayer::class,'convocation', 'id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}
