<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $username;
    public $content;
    public $works;
    public $characters;

    public function __construct($username, $content, $works, $characters)
    {
        $this->username = $username;
        $this->content = $content;
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
        return view('components.post');
    }
}
