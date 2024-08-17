<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Searching extends Component
{
    public $keyword;

    public function search()
    {
        $keyword = Str::slug($this->keyword);
        // return $this->redirect('/cari/' . $keyword, navigate: true);
        return redirect()->route('article.search', $keyword);
    }

    public function render()
    {
        // return view('livewire.searching');
        return view('public.article.search');
    }
}
