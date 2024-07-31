<?php

namespace App\Http\Controllers\Public;

use App\Models\BlogArticle;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $data['category'] = BlogCategory::show()->with('blogArticles')->get();
        return view('public.category.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = BlogCategory::where('slug', $id)->first();
        $data['blogArticle'] = BlogArticle::limit(15)
            ->whereHas('blogCategory', function ($query) use ($id) {
                $query->where('slug', $id);
            })
            ->get();
        return view('public.category.show', $data);
    }
}
