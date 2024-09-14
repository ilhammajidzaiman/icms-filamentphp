<?php

namespace App\Http\Controllers\Public;

use App\Models\Feature\People;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index()
    {
        $data['people'] = People::show()->orderByDesc('created_at')->paginate(10);
        return view('public.people.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = People::show()->where('uuid', $id)->first();
        if (!$data['item']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            $data['page'] = env('APP_URL') . '/' . $data['item']->slug;
        endif;
        return view('public.people.show', $data);
    }
}
