<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property bool $has_drivers
 * @property bool $has_shirts
 * @property bool $has_cleaners
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereHasCleaners($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereHasDrivers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereHasShirts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = true;
    use SoftDeletes;


}
