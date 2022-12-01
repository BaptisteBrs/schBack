<?php

namespace App\Repositories;

use App\Models\ArticleType;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ArticleTypeRepository.
 */
class ArticleTypeRepository
{
    public function all()
    {
        return ArticleType::all();
    }

    public function save(ArticleType $article_type, array $array): ArticleType
    {
        $article_type->name = $array['name'];
        $article_type->picture = $array['picture_name'];

        $article_type->save();
        return $article_type;
    }

    public function show(int $id)
    {
        return ArticleType::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $article_type = new ArticleType();
        return $this->save($article_type, $array);
    }

    public function update(array $array, int $id)
    {
        $article_type = ArticleType::where('id', $id)->first();
        return $this->save($article_type, $array);
    }

    public function delete($id)
    {
        $article_type = ArticleType::where('id', $id)->first();
        $article_type->delete();
        return $article_type;
    }
}
