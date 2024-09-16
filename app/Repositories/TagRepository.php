<?php

namespace App\Repositories;

use App\Models\ArticleTag;
use App\Models\Tag;

//use Your Model

/**
 * Class TagRepository.
 */
class TagRepository
{
    public function all()
    {
        return Tag::all();
    }

    public function save(Tag $tag, array $array): Tag
    {
        $tag->name = $array['name'];
        $tag->save();
        return $tag;
    }

    public function show(int $id)
    {
        return Tag::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $tag = new Tag();
        return $this->save($tag, $array);
    }

    public function update(array $array, int $id)
    {
        $tag = Tag::where('id', $id)->first();
        return $this->save($tag, $array);
    }

    public function delete($id)
    {
        ArticleTag::where('tag', $id)->delete();
        $tag = Tag::where('id', $id)->first();
        $tag->delete();
        return $tag;
    }
}
