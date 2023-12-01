<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public function __construct(public string $title, public string $for = 'web')
    {
    }

    public function render(): View
    {
        $title = $this->title;
        if ($this->for === 'staff') {
            return view('layouts.staff.guest', compact('title'));
        } elseif ($this->for === 'superadmin') {
            return view('layouts.superadmin.guest', compact('title'));
        }
        return view('layouts.guest', compact('title'));
    }
}
