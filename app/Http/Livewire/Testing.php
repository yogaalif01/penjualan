<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Testing extends Component
{
    public $count = 0;
    public $message = '';
    public function render()
    {
        return view('livewire.testing')->extends('livewire.layouts.template');
    }

    public function callFunction()
    {
        $this->count++;
    }

}
