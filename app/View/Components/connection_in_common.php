<?php

namespace App\View\Components;

use Illuminate\View\Component;

class connection_in_common extends Component
{
    public $connection_in_common;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($connection_in_common)
    {
        $this->connection_in_common = $connection_in_common;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.connection_in_common');
    }
}
