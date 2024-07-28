<?php

namespace App\Http\Controllers\Public;

use App\Models\File;
use App\Models\BlogArticle;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['file'] = File::show()->orderByDesc('created_at')->paginate(15);
        $data['articleRandom'] = BlogArticle::limit(18)->inRandomOrder()->get();
        $data['category'] = BlogCategory::show()->limit(10)->inRandomOrder()->get();
        $data['popular'] = BlogArticle::show()->limit(5)->orderByDesc('visitor')->get();
        $data['latest'] = BlogArticle::show()->limit(5)->orderByDesc('published_at')->get();
        return view('public.file.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = File::show()->where('slug', $id)->first();
        $data['articleRandom'] = BlogArticle::limit(18)->inRandomOrder()->get();
        // $this->update($data['item']);
        return view('public.file.show', $data);
    }

    public function update($id)
    {
        $id->increment('visitor');
    }
}
