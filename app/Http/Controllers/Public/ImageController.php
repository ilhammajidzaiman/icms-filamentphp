<?php

namespace App\Http\Controllers\Public;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        $data['image'] = Image::show()->orderByDesc('created_at')->paginate(12);
        return view('public.image.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = Image::show()->where('slug', $id)->first();
        if (!$data['item']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            $data['page'] = env('APP_URL') . '/' . $data['item']->slug;
        endif;
        return view('public.image.show', $data);
    }
}
