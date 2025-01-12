<?php

namespace App\Http\Controllers\Public;

use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $data['blogArticle'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->paginate(18);
        return view('page.public.article.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = BlogArticle::show()
            ->with(['tags', 'blogCategory'])
            ->where('slug', $id)
            ->first();
        $data['blogArticle'] = BlogArticle::show()
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
        if (!$data['item']) :
            $data['share'] = env('APP_URL') . '/';
        else :
            // $data['item']->increment('visitor');
            $this->update($data['item']);
            $data['share'] = env('APP_URL') . '/' . $data['item']->slug;
        endif;
        return view('page.public.article.show', $data);
    }

    public function update($id)
    {
        $id->increment('visitor');
    }

    public function search(string $id)
    {
        $data['keyword'] = $id;
        $data['data'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        return view('page.public.article.search', $data);
    }
}
