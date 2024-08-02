<?php

namespace App\Http\Controllers\Public;

use App\Models\Image;
use App\Models\Carousel;
use App\Models\BlogArticle;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use App\Models\People;

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
        $data['people'] = People::show()->orderBy('order')->get();
        return view('public.home.index', $data);
    }
}
