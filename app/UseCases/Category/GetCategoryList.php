<?php

namespace App\UseCases\Category;

use App\Models\Category;
use App\Models\CategoryOrder;

class GetCategoryList
{
    /**
     * @param int|string|null $user_id
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category>
     */
    public function __invoke($user_id)
    {
        $category_order = CategoryOrder::where('user_id', $user_id)->first();
        $query = Category::where('user_id', $user_id)->where('is_archive', false);
        if (!is_null($category_order)) {
            $order = implode(',', $category_order->category_order);
            $query = $query->orderByRaw("FIELD(id, $order)");
        }
        return $query->get();
    }
}
