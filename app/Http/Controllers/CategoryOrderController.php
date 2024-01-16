<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryOrderRequest;
use App\UseCases\CategoryOrder\UpdateCategoryOrder;
use Illuminate\Support\Facades\Log;

use function Psy\debug;

class CategoryOrderController extends Controller
{
    public function update(UpdateCategoryOrderRequest $request)
    {
        $category_order = $request->makeCategoryOrder();

        $update_category_order = new UpdateCategoryOrder();
        $update_category_order($category_order['user_id'], $category_order['category_order']);
    }
}
