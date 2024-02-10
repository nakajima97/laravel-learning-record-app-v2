<?php

namespace App\UseCases\Category;

use App\Models\Category;
use App\Models\CategoryOrder;

class StoreCategory
{
    /**
     * @return boolean
     */
    public function __invoke(Category $category, int $user_id)
    {
        // トランザクションを開始
        $result = \DB::transaction(function () use ($category, $user_id) {
            // カテゴリーを保存
            $category_save_result = $category->save();
            if (!$category_save_result) {
                \DB::rollBack();
                return false;
            }

            // カテゴリーの並び順を更新
            $category_order = CategoryOrder::where('user_id', $user_id)->first();
            if (is_null($category_order)) {
                $category_order = new CategoryOrder([
                    'user_id' => $user_id,
                    'category_order' => [$category->id]
                ]);
            } else {
                $category_order->category_order = array_merge($category_order->category_order, [$category->id]);
            }
            $category_order_save_result = $category_order->save();

            // カテゴリーの並び順の保存に失敗した場合はロールバック
            if (!$category_order_save_result) {
                \DB::rollBack();
                return false;
            }

            return true;
        });

        // トランザクションの結果を返す
        return $result;
    }
}
