<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class blogSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;
    public $tags;
    public $latestPosts;
    public function __construct($tags, $categories, $latestPosts)
    {
        $this->tags = $tags;
        $this->categories = $categories;
        // $this->latest_posts = $latest_posts;
        $this->latestPosts = $latestPosts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partial.blog-sidebar');
    }
}
