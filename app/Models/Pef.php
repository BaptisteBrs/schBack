<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Pef
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string $publication
 * @property string $date
 * @property string|null $begin
 * @property string|null $end
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Pef newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pef newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pef query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef wherePublication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereUpdatedAt($value)
 * @property string|null $picture
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Pef onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Pef whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pef wherePicture($value)
 * @method static \Illuminate\Database\Query\Builder|Pef withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Pef withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PefPictures> $pictures
 * @property-read int|null $pictures_count
 * @mixin \Eloquent
 */
class Pef extends Model
{
    use HasFactory;
    protected $table = 'pef';
    public $timestamps = true;
    use SoftDeletes;

    public function pictures()
    {
        return $this->hasMany(PefPictures::class, 'pef_id', 'id');
    }
}
