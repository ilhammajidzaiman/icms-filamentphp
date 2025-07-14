<?php

namespace App\Http\Controllers\Public;

use App\Models\Feature\People;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index()
    {
        $data['record'] = People::show()
            ->with(['peoplePosition'])
            ->orderBy('order')
            ->paginate(10);
        return view('page.public.people.index', $data);
    }

    public function show(string $id)
    {
        $data['record'] = People::show()
            ->with(['peoplePosition'])
            ->where('uuid', $id)
            ->first();
        if (!$data['record']) :
            $data['page'] = env('APP_URL') . '/';
        else :
            $data['page'] = env('APP_URL') . '/' . $data['record']->slug;
        endif;
        return view('page.public.people.show', $data);
    }
}
