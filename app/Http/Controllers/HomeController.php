<?php

namespace App\Http\Controllers;

use App\Models\Media\File;
use App\Models\Media\Image;
use App\Models\Feature\People;
use App\Models\Media\Carousel;
use App\Models\Post\BlogArticle;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['carousel'] = Carousel::show()
            ->limit(5)
            ->orderByDesc('id')
            ->get();
        $data['article'] = BlogArticle::show()
            ->limit(8)
            ->orderByDesc('published_at')
            ->get();
        $data['people'] = People::show()
            ->limit(9)
            ->orderBy('order')
            ->get();
        $data['file'] = File::show()
            ->limit(6)
            ->orderByDesc('id')
            ->get();
        $data['image'] = Image::show()
            ->limit(9)
            ->orderByDesc('id')
            ->get();
        return view('pages.home.index', $data);
    }
}
