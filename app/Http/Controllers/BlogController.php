<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        if($request->method() == 'POST')
        {
            $image_name = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$image_name);
            Blog::query()->create([
                'name' => $request->name,
                'title' => $request->title,
                'categories' => collect($request->categories)->implode(','),
                'desc' => $request->desc,
                'writer' => $request->writer,
                'image' => 'uploads/'.$image_name
            ]);
            return redirect(route('blog.list'));
        }
        $categories = Category::query()
            ->where('top_category',null)
            ->get();
        return view('blog.store',compact('categories'));
    }

    public function list()
    {
        $blogs = Blog::all();
        return view('blog.blogs',compact('blogs'));
    }

    public function update(Blog $blog,Request $request)
    {
        if($request->method() == 'POST')
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_name = Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $blog->update([
                'name' => $request->name,
                'title' => $request->title,
                'categories' => collect($request->categories)->implode(','),
                'desc' => $request->desc,
                'writer' => $request->writer,
                'image' => $image_name
            ]);
            return redirect(route('blog.list'));
        }
        $selected_categories = explode(',',$blog->categories);
        $categories = Category::query()
            ->where('top_category',null)
            ->get();
        return view('blog.update',compact(['blog','selected_categories','categories']));
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect(route('blog.list'));
    }
}
