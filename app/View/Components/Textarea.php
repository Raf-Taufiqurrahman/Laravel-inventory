<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $title, $name, $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $name, $placeholder)
    {
        $this->title = $title;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
