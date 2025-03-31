<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ManoButton extends Component
{
    public $style;
    /**
     * Create a new component instance.
     */
    public function __construct($style)
    {
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.mano-button');
    }
}
