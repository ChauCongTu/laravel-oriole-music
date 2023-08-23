<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class posted_time extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $posted_at,
        public $created_at
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posted_time');
    }
}
