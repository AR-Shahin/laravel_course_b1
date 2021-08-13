<?php

namespace App\Http\View\Composers;

use App\Models\Skill;
use Illuminate\View\View;


class ViewComposer
{
    public function compose(View $view)
    {
        $view->with('globalSkills', Skill::get());
    }
}
