<?php

namespace App\UseCases\Category;

use App\Models\Category;

class GetCategoryList
{
    /**
     * @param int|string|null $user_id
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category>
     */
    public function __invoke($user_id)
    {
        return Category::where('user_id', $user_id)->get();
    }
}
