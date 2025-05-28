<?php

namespace App\Http\Controllers\Public;

use App\Models\Post\Page;
use App\Models\Media\File;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        return view('page.public.search.index');
    }

    public function show(string $id)
    {
        $data['keyword'] = $id;
        $data['category'] = BlogCategory::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        $data['article'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        $data['page'] = Page::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        $data['file'] = File::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        return view('page.public.search.show', $data);
    }
}
