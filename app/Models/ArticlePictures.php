<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ArticlePictures
 *
 * @property int $id
 * @property string $name
 * @property int $article_id
 * @method static \Illuminate\Database\Eloquent\Builder|ArticlePictures newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticlePictures newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticlePictures query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticlePictures whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticlePictures whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticlePictures whereName($value)
 * @mixin \Eloquent
 */
class ArticlePictures extends Model
{
    use HasFactory;
    protected $table = 'articles_pictures';
    public $timestamps = false;
}
