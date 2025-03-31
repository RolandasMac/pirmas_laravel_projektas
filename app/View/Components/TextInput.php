<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    public $kintamasis;
    public $baseurl;
    /**
     * Create a new component instance.
     */
    public function __construct($kintamasis, $baseurl)
    {
        //
        $this->kintamasis = $kintamasis;
        $this->baseurl    = $baseurl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.text-input');
    }
}
