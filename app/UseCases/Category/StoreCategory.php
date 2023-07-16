<?php

namespace App\UseCases\Category;

use App\Models\Category;

class StoreCategory
{
  public function __invoke(Category $category)
  {
    $result = $category->save();

    return $result;
  }
}