<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Boutique
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $type
 * @property string $picture
 * @property string $priceAD
 * @property string $priceJR
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique query()
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique wherePriceAD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique wherePriceJR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Boutique onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Boutique withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Boutique withoutTrashed()
 */
class Boutique extends Model
{
    use HasFactory;
    protected $table = 'boutique';
    public $timestamps = true;
    use SoftDeletes;


}
