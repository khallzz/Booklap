<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FieldCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $item;
    public $loop;
    public function __construct($item, $loop)
    {
        $this->item = $item;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.field-card');
    }
}
