<?php

namespace App\Http\Controllers\Public;

use App\Models\Image;
use App\Models\Carousel;
use App\Models\BlogArticle;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['carousel'] = Carousel::show()->limit(5)->orderByDesc('created_at')->get();
        $data['articleSlide'] = BlogArticle::show()->limit(8)->orderByDesc('published_at')->get();
        $data['articleTop'] = BlogArticle::show()->limit(3)->orderByDesc('published_at')->get();
        $data['blogArticle'] = BlogArticle::show()->limit(9)->orderByDesc('published_at')->get();
        $data['category'] = BlogCategory::show()->limit(10)->inRandomOrder()->get();
        $data['popular'] = BlogArticle::show()->limit(5)->orderByDesc('visitor')->get();
        $data['latest'] = BlogArticle::show()->limit(5)->orderByDesc('published_at')->get();
        $data['image'] = Image::show()->limit(8)->orderByDesc('created_at')->get();
        return view('public.home.index', $data);
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
        return view('public.home.show', $data);
    }

    public function update($id)
    {
        $id->increment('visitor');
    }
}
