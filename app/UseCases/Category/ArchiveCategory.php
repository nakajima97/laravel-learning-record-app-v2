<?php

namespace App\UseCases\Category;

use App\Models\Category;

class ArchiveCategory
{
  /**
   * @param int|string|null $id
   */
  public function __invoke($id)
  {
    Category::find($id)->Archive();
  }
}