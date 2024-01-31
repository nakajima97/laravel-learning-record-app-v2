<?php

namespace App\Http\Controllers;

use App\UseCases\Category\UnarchiveCategory;
use Illuminate\Http\Request;

class CategoryArchiveController extends Controller
{
    /**
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $unarchive_category = new UnarchiveCategory();
        $unarchive_category($id);

        return redirect()->route('categories.index');
    }
}
