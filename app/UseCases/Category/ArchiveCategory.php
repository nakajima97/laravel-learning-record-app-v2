<?php

namespace App\UseCases\Category;

use App\Models\Category;

class ArchiveCategory
{
    /**
     * @param int|string|null $id
     * @return void
     */
    public function __invoke($id)
    {
        $category = Category::find($id);
        if ($category !== null) {
            $category->Archive();
        }
    }
}
