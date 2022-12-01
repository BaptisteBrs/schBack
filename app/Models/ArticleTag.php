<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\ArticleTag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $tag
 * @property int $article
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag whereArticle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Query\Builder|ArticleTag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ArticleTag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ArticleTag withoutTrashed()
 */
class ArticleTag extends Model
{
    use HasFactory;
    protected $table = 'article_tag';
    public $timestamps = true;
    use SoftDeletes;



}
