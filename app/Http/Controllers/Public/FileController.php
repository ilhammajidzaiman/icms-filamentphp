<?php

namespace App\Http\Controllers\Public;

use App\Models\Media\File;
use App\Models\Media\FileCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $data['record'] = File::show()
            ->with(['fileCategory'])
            ->orderByDesc('created_at')
            ->paginate(15);
        return view('page.public.file.index', $data);
    }

    public function show(string $id)
    {
        $data['record'] = File::show()
            ->with(['fileCategory'])
            ->where('slug', $id)
            ->first();
        return view('page.public.file.show', $data);
    }

    public function update($id)
    {
        $id->increment('downloader');
    }

    public function download($id)
    {
        $record = File::show()
            ->with(['fileCategory'])
            ->where('slug', $id)
            ->first();
        if ($record->file) :
            if (Storage::disk('public')
                ->exists($record->file)
            ) :
                $this->update($record);
                return Storage::disk('public')
                    ->download($record->file);
            endif;
        endif;
    }

    public function category(string $id)
    {
        $data['fileCategory'] = FileCategory::show()
            ->where('slug', $id)
            ->first();
        $data['record'] = File::show()
            ->whereHas('fileCategory', function ($query) use ($id) {
                $query->where('slug', $id);
            })
            ->paginate(18);
        return view('page.public.file.category', $data);
    }

    public function search(string $id)
    {
        $data['keyword'] = $id;
        $data['record'] = File::show()
            ->with(['fileCategory'])
            ->where('slug', 'like', '%' . $id . '%')
            ->paginate(15);
        return view('page.public.file.search', $data);
    }
}
