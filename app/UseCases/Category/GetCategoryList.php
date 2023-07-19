<?php

namespace App\UseCases\Category;

use App\Models\Category;

class GetCategoryList
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category>
     */
    public function __invoke()
    {
        return Category::all();
    }
}
