<?php

namespace App\UseCases\Category;

use App\Models\Category;

class GetCategoryList
{
    /**
     * @return mixed
     */
    public function __invoke()
    {
        return Category::all();
    }
}
