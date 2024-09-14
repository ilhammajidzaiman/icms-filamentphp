<?php

namespace App\Http\Controllers\Public;

use App\Models\Post\Page;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function show(string $id)
    {
        $data['item'] = Page::show()->where('slug', $id)->first();
        $data['articleRandom'] = BlogArticle::show()->limit(18)->inRandomOrder()->get();
        $data['category'] = BlogCategory::show()->limit(10)->inRandomOrder()->get();
        $data['popular'] = BlogArticle::show()->limit(5)->orderByDesc('visitor')->get();
        $data['latest'] = BlogArticle::show()->limit(5)->orderByDesc('published_at')->get();
        if (!$data['item']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            $data['page'] = env('APP_URL') . '/' . $data['item']->slug;
        endif;
        return view('public.page.show', $data);
    }
}
