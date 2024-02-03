<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\UseCases\Category\GetArchivedCategoryList;
use App\UseCases\Category\GetCategoryList;
use App\UseCases\Category\StoreCategory;
use App\UseCases\Category\FindCategory;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $user_id = Auth::id();

        $get_category = new GetCategoryList();
        $categories = $get_category($user_id);

        $get_archived_category = new GetArchivedCategoryList();
        $archive_categories = $get_archived_category($user_id);

        return view('category.index', ['categories' => $categories, 'archive_categories' => $archive_categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $request->makeCategory();

        $category['user_id'] = Auth::id();

        $store_category = new StoreCategory();
        $store_category($category);

        return redirect()->route('categories.index');
    }

    /**
     * @param integer $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show($id)
    {
        $find_category = new FindCategory();
        $category = $find_category($id);

        if ($category === null) {
            abort(404);
        }

        return view('category.show', ['category' => $category]);
    }
}
