<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonLink extends Component
{
    public $icon, $url, $title, $style;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon, $url, $title, $style)
    {
        $this->icon = $icon;
        $this->url = $url;
        $this->title = $title;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-link');
    }
}
