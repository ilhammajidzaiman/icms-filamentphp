<?php

namespace App\Http\Controllers\Public;

use App\Models\BlogArticle;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $data['category'] = BlogCategory::show()->with('blogArticles')->paginate(20);
        return view('public.category.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = BlogCategory::show()->where('slug', $id)->first();
        $data['blogArticle'] = BlogArticle::show()
            ->whereHas('blogCategory', function ($query) use ($id) {
                $query->where('slug', $id);
            })
            ->paginate(18);
        return view('public.category.show', $data);
    }
}
