<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Setting\SettingSosmed;
use App\Models\Setting\NavigationFooter;

class Footer extends Component
{
    public $footer;
    public $sosmed;
    public object $siteSetting;

    public function __construct($siteSetting)
    {
        $this->siteSetting = (object) $siteSetting;
        $this->footer = NavigationFooter::show()
            ->where('parent_id', -1)
            ->withOnly(['parent', 'children'])
            ->orderBy('order')
            ->get();
        $this->sosmed = SettingSosmed::show()
            ->take(5)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.footer', [
            'siteSetting' => $this->siteSetting,
            'footer' => $this->footer,
            'sosmed' => $this->sosmed,
        ]);
    }
}
