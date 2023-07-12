<?php

namespace App\View\Components;

use Illuminate\View\Component;

class skeleton extends Component
{
    public $skeleton;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skeleton)
    {
        $this->skeleton = $skeleton;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.skeleton');
    }
}
