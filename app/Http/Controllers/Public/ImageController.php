<?php

namespace App\Http\Controllers\Public;

use App\Models\Media\Image;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        $data['record'] = Image::show()
            ->orderByDesc('created_at')
            ->paginate(12);
        return view('page.public.image.index', $data);
    }

    public function show(string $id)
    {
        $data['record'] = Image::show()
            ->where('slug', $id)
            ->first();
        if (!$data['record']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            $data['page'] = env('APP_URL') . '/' . $data['record']->slug;
        endif;
        return view('page.public.image.show', $data);
    }
}
