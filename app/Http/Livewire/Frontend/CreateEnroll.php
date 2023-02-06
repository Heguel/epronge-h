<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class CreateEnroll extends Component
{
    public $options;

    public function mount($options)
    {
        $this->options = $options;
    }

    public function render()
    {
        return view('livewire.frontend.create-enroll');
    }
}
