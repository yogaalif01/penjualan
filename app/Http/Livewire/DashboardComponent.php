<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardComponent extends Component
{
    public $count = 0;
    public function render()
    {
        return view('livewire.dashboard-component')->extends('livewire.layouts.template');
    }
    public function testing()
    {
        $this->count++;
    }
}
