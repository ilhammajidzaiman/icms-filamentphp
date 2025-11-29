<?php

namespace App\Http\Controllers;

use App\Models\Post\BlogArticle;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('pages.article.index');
    }

    public function show(string $id)
    {
        $data['record'] = BlogArticle::show()
            ->with(['tags', 'category'])
            ->where('slug', $id)
            ->first();
        $data['other'] = BlogArticle::show()
            ->limit(8)
            ->get();
        // if (!$data['record']) :
        //     abort(404);
        // endif;
        // if ($data['record']) :
        //     $data['record']->increment('visitor');
        //     $data['share'] = env('APP_URL') . '/' . $data['record']->slug;
        // else :
        //     $data['share'] = env('APP_URL') . '/';
        // endif;
        return view('pages.article.show', $data);
    }
}
