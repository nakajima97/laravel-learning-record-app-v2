<?php

namespace App\UseCases\Category;

use App\Models\Category;

class FindCategory
{
    /**
     * @param int|string|null $id
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category>
     */
    public function __invoke($id)
    {
        return Category::find($id);
    }
}
