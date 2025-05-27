<?php

namespace App\Http\Controllers\Public;

use App\Models\Media\File;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(string $id)
    {
        $data['keyword'] = $id;
        $data['category'] = BlogCategory::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        $data['article'] = BlogArticle::show()
            ->with(['blogCategory'])
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        $data['document'] = File::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        return view('page.public.search.index', $data);
    }
}
