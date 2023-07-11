<?php

namespace App\UseCases\Category;

use App\Models\Category;

class GetCategoryList
{
    public function __invoke()
    {
        return Category::all();
    }
}
