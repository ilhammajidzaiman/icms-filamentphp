<?php

namespace App\Http\Controllers\Public;

use App\Models\Media\Video;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $data['record'] = Video::show()
            ->orderByDesc('created_at')
            ->paginate(12);
        return view('page.public.video.index', $data);
    }

    public function show(string $id)
    {
        $data['record'] = Video::show()
            ->where('slug', $id)
            ->first();
        if (!$data['record']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            $data['page'] = env('APP_URL') . '/' . $data['record']->slug;
        endif;
        return view('page.public.video.show', $data);
    }
}
