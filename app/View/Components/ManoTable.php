<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ManoTable extends Component
{
    public $tableData;
    /**
     * Create a new component instance.
     */
    public function __construct($tableData)
    {
        $this->tableData = $tableData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.mano-table');
    }
}
