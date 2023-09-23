<?php

namespace App\UseCases\Category;

use App\Models\Category;

class FindCategory
{
    /**
     * @param int|string|null $id
     * @return \App\Models\Category|null
     */
    public function __invoke($id)
    {
        return Category::find($id);
    }
}
