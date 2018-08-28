<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class ProductService
{
    /**
     * Продукты по категории
     * @param $slug_category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getProducts($slug_category)
    {
        if (!$slug_category) return Product::with('shop')->paginate(18);
        $category = Category::whereSlug($slug_category)->first();
        $ids = [$category->id];
        if ($category->isRoot()){
            $ids = array_merge($ids, $category->children()->active()->get()->pluck('id')->toArray());
            $ids = array_merge($ids, $category->leaves()->active()->get()->pluck('id')->toArray());
        }
        return Product::with('shop')->whereIn('category_id', $ids)->paginate(18);
    }
}
