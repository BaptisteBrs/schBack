<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Team
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $league
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereLeague($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @property \App\Models\Category|null $category
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Team onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Team withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Team withoutTrashed()
 * @mixin \Eloquent
 */
class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    public $timestamps = true;
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}
