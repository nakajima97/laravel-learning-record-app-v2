<?php

namespace App\UseCases\CategoryOrder;

use App\Models\CategoryOrder;
use Illuminate\Support\Facades\Log;

class UpdateCategoryOrder
{
    /**
     * @param array<int> $list
     * @return void
     */
    public function __invoke($user_id, $order)
    {
        $category_order = CategoryOrder::where('user_id', $user_id)->first();
        if (is_null($category_order)) {
            $category_order = new CategoryOrder([
                'user_id' => $user_id,
                'category_order' => $order
            ]);
        } else {
            $category_order->category_order = $order;
        }
        $category_order->save();
    }
}
