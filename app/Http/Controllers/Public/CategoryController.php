<?php

namespace App\Http\Controllers\Public;

use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $data['category'] = BlogCategory::show()
            ->with(['blogArticles'])
            ->paginate(20);
        return view('page.public.category.index', $data);
    }

    public function show(string $id)
    {
        $data['category'] = BlogCategory::show()
            ->where('slug', $id)
            ->first();
        $data['article'] = BlogArticle::show()
            ->whereHas('blogCategory', function ($query) use ($id) {
                $query->where('slug', $id);
            })
            ->paginate(18);
        return view('page.public.category.show', $data);
    }
}
