<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticlePictures;
use App\Models\ArticleTag;
use Carbon\Carbon;
use DateTime;
use Storage;

/**
 * Class ArticleRepository.
 */
class ArticleRepository
{

    public function all()
    {
        return Article::with('type', 'tags', 'pictures')->get();
    }

    public function save(Article $article, array $array, $is_create = false): Article
    {
        if ($is_create) {
            $article->publication = new DateTime();
        }
        $article->title = $array['title'];
        $article->date = $array['date'];
        $article->begin = array_key_exists('begin', $array) ? $array['begin'] : null;
        $article->end = array_key_exists('end', $array) ? $array['end'] : null;
        $article->type = $array['type'];
        $article->description = array_key_exists('description', $array) ? $array['description'] : null;
        //$article->picture = array_key_exists('picture', $array) ? $array['picture'] : null;

        $article->save();
        if (count($array['picture']) > 0) {
            $article_pictures = ArticlePictures::where('article_id', $article->id)->get();
            foreach ($article_pictures as $file) {
                Storage::disk('public')->delete(str_replace('storage/', '', $file->name));
            }
            ArticlePictures::where('article_id', $article->id)->delete();
        }
        foreach ($array['picture'] as $pictureName) {
            $picture =  new ArticlePictures();
            $picture->name = $pictureName;
            $picture->article_id = $article->id;
            $picture->save();
        }

        foreach ($array['tags'] as $tag) {
            $article_tag =  new ArticleTag();
            $article_tag->tag = $tag;
            $article_tag->article = $article->id;
            $article_tag->save();
        }

        $article = Article::where('id', $article->id)->with('type', 'tags', 'pictures')->first();

        return $article;
    }

    public function show(int $id)
    {
        return Article::where('id', $id)->with('type', 'tags', 'pictures')->first();
    }

    public function store(array $array)
    {
        $article = new Article();
        return $this->save($article, $array, true);
    }

    public function update(array $array, int $id)
    {
        $article = Article::where('id', $id)->first();
        return $this->save($article, $array);
    }

    public function delete($id)
    {
        $article_pictures = ArticlePictures::where('article_id', $id)->get();
        foreach ($article_pictures as $file) {
            Storage::disk('public')->delete(str_replace('storage/', '', $file->name));
        }
        ArticlePictures::where('article_id', $id)->delete();
        $article = Article::where('id', $id)->first();
        $article->delete();
        return $article;
    }

    public function last()
    {
        return Article::with('type', 'tags', 'pictures')->orderBy('id', 'desc')->take(5)->get();
    }
}
