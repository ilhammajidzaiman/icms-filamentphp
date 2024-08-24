<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Illuminate\Support\Str;

class SearchModal extends Component
{
    // public function render()
    // {
    //     return view('livewire.public.search-modal');
    // }

    public $keyword;

    public function searchModal()
    {
        $keyword = Str::slug($this->keyword);
        return $this->redirectRoute('article.search', $keyword, navigate: true);
    }

    public function render()
    {
        return view('livewire.public.search-modal');
    }
}
