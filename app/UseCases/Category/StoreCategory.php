<?php

namespace App\UseCases\Category;

use App\Models\Category;

class StoreCategory
{
  /**
   * @return boolean
   */
  public function __invoke(Category $category)
  {
    $result = $category->save();

    return $result;
  }
}