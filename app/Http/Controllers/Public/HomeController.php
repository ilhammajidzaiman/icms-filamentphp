<?php

namespace App\Http\Controllers\Public;

use App\Models\Media\Image;
use App\Models\Media\Video;
use App\Models\Feature\People;
use App\Models\Media\Carousel;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['carousel'] = Carousel::show()
            ->limit(5)
            ->orderByDesc('created_at')
            ->get();
        $data['articleSlide'] = BlogArticle::show()
            ->with([])
            ->limit(8)
            ->orderByDesc('published_at')
            ->get();
        $data['articleTop'] = BlogArticle::show()
            ->with([])
            ->limit(3)
            ->orderByDesc('published_at')
            ->get();
        $data['blogArticle'] = BlogArticle::show()
            ->with([])
            ->limit(9)
            ->orderByDesc('published_at')
            ->get();
        $data['category'] = BlogCategory::show()
            ->with([])
            ->limit(10)
            ->inRandomOrder()
            ->get();
        $data['popular'] = BlogArticle::show()
            ->with([])
            ->limit(5)
            ->orderByDesc('visitor')
            ->get();
        $data['latest'] = BlogArticle::show()
            ->with([])
            ->limit(5)
            ->orderByDesc('published_at')
            ->get();
        $data['image'] = Image::show()
            ->with([])
            ->limit(8)
            ->orderByDesc('created_at')
            ->get();
        $data['video'] = Video::show()
            ->with([])
            ->limit(8)
            ->orderByDesc('created_at')
            ->get();
        $data['people'] = People::show()
            ->with([])
            ->orderBy('order')
            ->get();
        return view('page.public.home.index', $data);
    }
}
