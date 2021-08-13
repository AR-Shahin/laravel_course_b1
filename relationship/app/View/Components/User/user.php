<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

class user extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $test;
    public $shahin;
    public function __construct($title, $test, $shahin)
    {
        $this->title = $title;
        $this->test = $test;
        //$this->shahin = $shahin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.user');
    }
}
