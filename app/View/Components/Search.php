<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Search extends Component
{
    public $name, $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search');
    }
}
