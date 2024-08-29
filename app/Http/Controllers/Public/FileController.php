<?php

namespace App\Http\Controllers\Public;

use App\Models\File;
use App\Models\BlogArticle;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use App\Models\FileCategory;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $data['file'] = File::show()->orderByDesc('created_at')->paginate(15);
        $data['category'] = BlogCategory::show()->limit(10)->inRandomOrder()->get();
        $data['popular'] = BlogArticle::show()->limit(5)->orderByDesc('visitor')->get();
        $data['latest'] = BlogArticle::show()->limit(5)->orderByDesc('published_at')->get();
        return view('public.file.index', $data);
    }

    public function show(string $id)
    {
        $data['item'] = File::show()->where('slug', $id)->first();
        return view('public.file.show', $data);
    }

    public function update($id)
    {
        $id->increment('downloader');
    }

    public function download($id)
    {
        $item = File::show()->where('slug', $id)->first();
        if ($item->file) :
            if (Storage::disk('public')->exists($item->file)) :
                $this->update($item);
                return Storage::disk('public')->download($item->file);
            endif;
        endif;
    }

    public function category(string $id)
    {
        $data['item'] = FileCategory::show()->where('slug', $id)->first();
        $data['file'] = File::show()
            ->whereHas('fileCategory', function ($query) use ($id) {
                $query->where('slug', $id);
            })
            ->paginate(18);
        return view('public.file.category', $data);
    }

    public function search(string $id)
    {
        $data['keyword'] = $id;
        $data['data'] = File::where('slug', 'like', '%' . $id . '%')->paginate(15);
        return view('public.file.search', $data);
    }
}
