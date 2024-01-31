<?php

namespace App\UseCases\Category;

use App\Models\Category;

class UnarchiveCategory
{
    /**
     * @param int|string|null $id
     * @return void
     */
    public function __invoke($id)
    {
        $category = Category::find($id);
        if ($category !== null) {
            $category->unarchive();
        }
    }
}
