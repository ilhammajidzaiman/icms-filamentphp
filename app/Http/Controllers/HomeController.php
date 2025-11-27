<?php

namespace App\Http\Controllers;

use App\Models\Media\File;
use App\Models\Media\Image;
use App\Models\Feature\People;
use App\Models\Media\Carousel;
use App\Models\Feature\Partner;
use App\Models\Feature\Service;
use App\Models\Post\BlogArticle;
use App\Models\Feature\Technology;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['carousel'] = Carousel::show()
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $data['technology'] = Technology::show()
            ->orderByDesc('id')
            ->limit(20)
            ->get();
        $data['service'] = Service::show()
            ->orderByDesc('id')
            ->limit(3)
            ->get();
        $data['article'] = BlogArticle::show()
            ->orderByDesc('published_at')
            ->limit(8)
            ->get();
        $data['partner'] = Partner::show()
            ->orderByDesc('id')
            ->limit(20)
            ->get();
        $data['people'] = People::show()
            ->orderBy('order')
            ->limit(10)
            ->get();
        $data['file'] = File::show()
            ->orderByDesc('id')
            ->limit(6)
            ->get();
        $data['image'] = Image::show()
            ->orderByDesc('id')
            ->limit(9)
            ->get();
        return view('pages.home.index', $data);
    }
}
