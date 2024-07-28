<?php

namespace App\Http\Controllers\Public;

use App\Models\BlogArticle;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('public.article.index');
    }

    public function show(string $id)
    {
        $data['item'] = BlogArticle::where('slug', $id)->with('blogTags')->first();
        $data['articleRandom'] = BlogArticle::limit(18)->inRandomOrder()->get();
        $data['category'] = BlogCategory::show()->limit(10)->inRandomOrder()->get();
        $data['popular'] = BlogArticle::show()->limit(5)->orderByDesc('visitor')->get();
        $data['latest'] = BlogArticle::show()->limit(5)->orderByDesc('published_at')->get();
        if (!$data['item']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            // $data['item']->increment('visitor');
            $this->update($data['item']);
            $data['page'] = env('APP_URL') . '/' . $data['item']->slug;
        endif;
        return view('public.article.show', $data);
    }

    public function update($id)
    {
        $id->increment('visitor');
    }
}
