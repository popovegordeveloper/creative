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
        if ($category) {
            $sub_categories = $category->children->merge($category->leaves()->get());
            \View::share(['sub_categories' => $sub_categories]);
        }
    }
}