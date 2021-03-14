<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(Category $category)
    {   
        $category = Category::get();
        return view('faro.form', compact('category'));
    }

    public function create()
    {
        return view('faro.form');
    }

    public function store(Request $request)
    {
        $category = request()->validate([
            'name' => ['required', 'max:255'],
        ]);
        
        $categoryObject = new Category($category);
        $categoryObject->save($category);
    }
}