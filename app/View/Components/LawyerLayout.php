<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LawyerLayout extends Component
{
    public $case;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($case)
    {
        $this->case = $case;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.lawyer');
    }
}
