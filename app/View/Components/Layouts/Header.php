<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Header extends Component
{
    public function __construct()
    {

    }

    public function render()
    {
        return view('components.layouts.header');
    }
}
