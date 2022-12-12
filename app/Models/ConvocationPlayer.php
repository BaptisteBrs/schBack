<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\ConvocationPlayer
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $player
 * @property int $convocation
 * @property bool|null $is_driver
 * @property bool|null $is_shirt
 * @property bool|null $is_cleaner
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereConvocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereIsCleaner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereIsDriver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereIsShirt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer wherePlayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|ConvocationPlayer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ConvocationPlayer whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ConvocationPlayer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ConvocationPlayer withoutTrashed()
 */
class ConvocationPlayer extends Model
{
    use HasFactory;
    protected $table = 'convocation_player';
    public $timestamps = true;
    use SoftDeletes;

    public function player()
    {
        return $this->hasOne(User::class, 'id', 'player');
    }
}
