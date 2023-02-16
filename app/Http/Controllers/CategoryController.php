<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        if($request->method() == 'POST')
        {
            Category::query()->create([
                'name' => $request->name,
                'top_category' => $request->top_category,
            ]);
            return redirect(route('category.list'));
        }
        $categories = Category::all();
        return view('category.store',compact('categories'));

    }
    public function list()
    {
        $categories = Category::all();
        return view('category.categories',compact('categories'));
    }

    public function update(Category $category,Request $request)
    {
        if($request->method() == 'POST')
        {
            $category->update([
                'name' => $request->name,
                'top_category' => $request->top_category,
            ]);
            return redirect(route('category.list'));
        }

        $categories = Category::all();
        return view('category.update',compact(['category','categories']));
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect(route('category.list'));
    }
}
