<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct(public string $title, public string $for = 'web')
    {
    }

    public function render(): View
    {
        $title = $this->title;
        if ($this->for === 'staff') {
            return view('layouts.staff.app', compact('title'));
        } elseif ($this->for === 'superadmin') {
            return view('layouts.superadmin.app', compact('title'));
        }
        return view('layouts.app', compact('title'));
    }
}
