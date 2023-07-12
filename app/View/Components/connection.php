<?php

namespace App\View\Components;

use Illuminate\View\Component;

class connection extends Component
{
    public $connection;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.connection');
    }
}
