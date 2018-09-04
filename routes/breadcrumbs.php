<?php

Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $ancestors = $category->getAncestors();
    $root = $category->getRoot();
    foreach ($ancestors as $ancestor) {
        if ($ancestor->isRoot()) {
            $breadcrumbs->push($ancestor->name, route('catalog', [
                'slug_category' => $ancestor->slug,
            ]));
        } else {
            $breadcrumbs->push($ancestor->name, route('catalog', [
                'slug_category' => $root->slug,
                'slug_subcategory' => $ancestor->slug
            ]));
        }

    }

    if ($category->isRoot()) $breadcrumbs->push($category->name, route('catalog', $category->slug));
    else $breadcrumbs->push($category->name, route('catalog', [
        'slug_category' => $root->slug,
        'slug_subcategory' => $category->slug
    ]));
});