<?php

namespace App\View\Components;

use Illuminate\View\Component;

class request extends Component
{
    public $request;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.request');
    }
}
