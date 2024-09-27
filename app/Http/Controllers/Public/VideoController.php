<?php

namespace App\Http\Controllers\Public;

use App\Models\Media\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        $data['video'] = Video::show()->orderByDesc('created_at')->paginate(12);
        return view('public.video.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = Video::show()->where('slug', $id)->first();
        if (!$data['item']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            $data['page'] = env('APP_URL') . '/' . $data['item']->slug;
        endif;
        return view('public.video.show', $data);
    }
}
