<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonSave extends Component
{
    public $title, $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $icon)
    {
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-save');
    }
}
