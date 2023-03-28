<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Partenaire
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $zip
 * @property string|null $city
 * @property string|null $name
 * @property string|null $website
 * @property string|null $picture
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereZip($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|Partenaire onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Partenaire whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Partenaire withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Partenaire withoutTrashed()
 * @mixin \Eloquent
 */
class Partenaire extends Model
{
    use HasFactory;
    protected $table = 'partenaire';
    public $timestamps = true;
    use SoftDeletes;

}
