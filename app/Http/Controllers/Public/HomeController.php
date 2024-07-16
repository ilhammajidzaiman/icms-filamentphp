<?php

namespace App\Http\Controllers\Public;

use App\Models\BlogArticle;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['blogArticle'] = BlogArticle::show()->limit(9)->orderByDesc('published_at')->get();


        $data['category'] = BlogCategory::show()->limit(10)->inRandomOrder()->get();
        $data['popular'] = BlogArticle::show()->limit(5)->orderByDesc('visitor')->get();
        $data['newest  '] = BlogArticle::show()->limit(5)->orderByDesc('published_at')->get();
        return view('public.home.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
