<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\ArticleType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $picture
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|ArticleType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleType whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ArticleType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ArticleType withoutTrashed()
 * @mixin \Eloquent
 */
class ArticleType extends Model
{
    use HasFactory;
    protected $table = 'article_type';
    public $timestamps = true;
    use SoftDeletes;


}
