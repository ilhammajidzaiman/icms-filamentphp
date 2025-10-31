<?php

namespace App\Http\Controllers;

use App\Models\Post\Page;
use App\Models\Media\File;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index()
    {
        return view('page.public.search.index');
    }

    public function show(string $id)
    {
        $queryCategory = BlogCategory::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->get()
            ->map(function ($item) {
                $item->type = 'category';
                return $item;
            });

        $queryArticle = BlogArticle::show()
            ->with(['blogCategory'])
            ->where('slug', 'like', '%' . $id . '%')
            ->get()
            ->map(function ($item) {
                $item->type = 'article';
                return $item;
            });

        $queryPage = Page::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->get()
            ->map(function ($item) {
                $item->type = 'page';
                return $item;
            });

        $queryFile = File::show()
            ->where('slug', 'like', '%' . $id . '%')
            ->get()
            ->map(function ($item) {
                $item->type = 'file';
                return $item;
            });

        $combined = $queryArticle
            ->concat($queryCategory)
            ->concat($queryPage)
            ->concat($queryFile)
            ->sortByDesc('created_at')
            ->values();
        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $results = $combined->forPage($currentPage, $perPage)->values();
        $total = $combined->count();
        $data['pagination'] = new LengthAwarePaginator(
            $results,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
        $data['keyword'] = $id;
        return view('page.public.search.show', $data);
    }
}
