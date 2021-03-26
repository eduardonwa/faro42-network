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
        return view('faro.create');
    }

    public function store(Request $request)
    {
        $category = request()->validate([
            'name' => ['required'],
            'description'=> ['required', 'min:5']
        ]);
        
        $categoryObject = new Category($category);
        $categoryObject->save($category);
    }
}