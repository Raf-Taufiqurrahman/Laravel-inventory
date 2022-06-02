<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonModalSmall extends Component
{
    public $title, $icon, $style;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $icon, $style)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-modal-small');
    }
}
