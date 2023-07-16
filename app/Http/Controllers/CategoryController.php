<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\UseCases\Category\GetCategoryList;
use App\UseCases\Category\StoreCategory;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $get_category = new GetCategoryList();
        $categories = $get_category();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $request->makeCategory();

        $store_category = new StoreCategory();
        $store_category($category);

        return redirect()->route('categories.index');
    }
}
