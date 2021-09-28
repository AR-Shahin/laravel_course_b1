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
    public $let;
    public function __construct($tags, $categories, $let)
    {
        $this->tags = $tags;
        $this->categories = $categories;
        // $this->let = $let;
        // info($this->let);
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
