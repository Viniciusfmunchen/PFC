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

    public $user;
    public $post;
    public $works;
    public $characters;
    public $comments;

    public function __construct($user, $post, $works, $characters)
    {
        $this->user = $user;
        $this->post = $post;
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
