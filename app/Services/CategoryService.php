<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * Подкатегории
     * @param $slug
     * @return Category[]|\Baum\Extensions\Eloquent\Collection|mixed
     */
    public function getSubCategories($slug)
    {
        $category = Category::whereSlug($slug)->first();
        if ($category) \View::share(['sub_categories' => $category->descendants()->get()]);
    }
}