<?php

namespace App\Http\Controllers\Public;

use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $data['article'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->paginate(18);
        return view('page.public.article.index', $data);
    }

    public function show(string $id)
    {
        $data['record'] = BlogArticle::show()
            ->with(['blogTags', 'blogCategory'])
            ->where('slug', $id)
            ->first();
        $data['article'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->limit(18)
            ->inRandomOrder()
            ->get();
        $data['category'] = BlogCategory::show()
            ->limit(10)
            ->inRandomOrder()
            ->get();
        $data['popular'] = BlogArticle::show()
            ->limit(5)
            ->orderByDesc('visitor')
            ->get();
        $data['latest'] = BlogArticle::show()
            ->limit(5)
            ->orderByDesc('published_at')
            ->get();
        // if (!$data['record']) :
        //     abort(404);
        // endif;
        if ($data['record']) :
            $data['record']->increment('visitor');
            $data['share'] = env('APP_URL') . '/' . $data['record']->slug;
        else :
            $data['share'] = env('APP_URL') . '/';
        endif;
        return view('page.public.article.show', $data);
    }

    public function search(string $id)
    {
        $data['keyword'] = $id;
        $data['record'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        return view('page.public.article.search', $data);
    }
}
