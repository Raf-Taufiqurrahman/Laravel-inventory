<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonModal extends Component
{
    public $id, $icon, $style, $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $icon, $style, $title)
    {
        $this->id = $id;
        $this->icon = $icon;
        $this->style = $style;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-modal');
    }
}
