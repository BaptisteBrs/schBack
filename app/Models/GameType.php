<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\GameType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|GameType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameType query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|GameType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GameType whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|GameType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|GameType withoutTrashed()
 */
class GameType extends Model
{
    use HasFactory;
    protected $table = 'game_type';
    public $timestamps = true;
    use SoftDeletes;


}
