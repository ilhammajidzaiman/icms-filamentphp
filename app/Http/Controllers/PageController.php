<?php

namespace App\Http\Controllers;

use App\Models\Post\Page;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $data['data'] = Page::show()
            ->paginate(18);
        return view('page.public.page.index', $data);
    }

    public function show(string $id)
    {
        $data['record'] = Page::show()
            ->where('slug', $id)
            ->first();
        $data['articleRandom'] = BlogArticle::show()
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
        if (!$data['record']) :
            $data['share'] = env('APP_URL') . '/';
        else :
            $data['share'] = env('APP_URL') . '/' . $data['record']->slug;
        endif;
        return view('page.public.page.show', $data);
    }
}
