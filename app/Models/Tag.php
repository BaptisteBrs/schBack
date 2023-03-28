<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Tag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Tag withoutTrashed()
 * @mixin \Eloquent
 */
class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    public $timestamps = true;
    use SoftDeletes;


}
