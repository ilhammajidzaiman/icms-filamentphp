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
            ->limit(8)
            ->orderByDesc('published_at')
            ->get();
        $data['articleTop'] = BlogArticle::show()
            ->limit(3)
            ->orderByDesc('published_at')
            ->get();
        $data['blogArticle'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->limit(9)
            ->orderByDesc('published_at')
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
        $data['image'] = Image::show()
            ->limit(8)
            ->orderByDesc('created_at')
            ->get();
        $data['video'] = Video::show()
            ->limit(8)
            ->orderByDesc('created_at')
            ->get();
        $data['people'] = People::show()
            ->orderBy('order')
            ->get();
        return view('page.public.home.index', $data);
    }
}
