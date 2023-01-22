<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $works;
    public $characters;

    public function __construct($works, $characters)
    {
        $this->works = $works;
        $this->characters = $characters;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-form');
    }
}
