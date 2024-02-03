<?php

namespace App\Http\Controllers;

use App\UseCases\Category\UnarchiveCategory;
use App\UseCases\Category\ArchiveCategory;
use Illuminate\Http\Request;

class CategoryArchiveController extends Controller
{
    /**
     * カテゴリーをアーカイブする
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id)
    {
        $archive_category = new ArchiveCategory();
        $archive_category($id);

        return redirect()->route('categories.index');
    }

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
