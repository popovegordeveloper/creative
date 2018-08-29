<?php

Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $ancestors = $category->getAncestors();
    foreach ($ancestors as $ancestor) $breadcrumbs->push($ancestor->name, route('catalog', $ancestor->slug));
    $breadcrumbs->push($category->name, route('catalog', $category->slug));
});