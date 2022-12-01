<?php

namespace App\Repositories;

use App\Models\Category;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CategoryRepository.
 */
class CategoryRepository
{
    public function all()
    {
        return Category::all();
    }

    public function save(Category $category, array $array): Category
    {
        $category->name = $array['name'];
        $category->has_drivers = array_key_exists('has_drivers', $array) ? $array['has_drivers'] : false;
        $category->has_shirts = array_key_exists('has_shirts', $array) ? $array['has_shirts'] : false;
        $category->has_cleaners = array_key_exists('has_cleaners', $array) ? $array['has_cleaners'] : false;

        $category->save();
        return $category;
    }

    public function show(int $id)
    {
        return Category::where('id', $id)->first();
    }

    public function store(array $array)
    {
        $category = new Category();
        return $this->save($category, $array);
    }

    public function update(array $array, int $id)
    {
        $category = Category::where('id', $id)->first();
        return $this->save($category, $array);
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return $category;
    }
}
