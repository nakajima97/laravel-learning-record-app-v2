<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Category\GetCategoryList;

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
}
