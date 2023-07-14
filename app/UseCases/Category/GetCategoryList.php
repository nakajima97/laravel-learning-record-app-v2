<?php

namespace App\UseCases\Category;

use App\Models\Category;

class GetCategoryList
{
    /* @phpstan-ignore-next-line */
    public function __invoke()
    {
        return Category::all();
    }
}
