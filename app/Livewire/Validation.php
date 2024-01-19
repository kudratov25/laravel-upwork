<?php

namespace App\Livewire;

use Livewire\Component;

class Validation extends Component
{
    public $step = 1;
    public $name;
    public $age;
    public $file;

    protected $rules = [
        'name' => 'required|min:3',
        'age' => 'required|numeric',
        'file' => 'required|file|mimes:pdf',
    ];

    public function render()
    {
        return view('livewire.multi-step.step' . $this->step);
    }

    public function nextStep()
    {
        $this->validate();
        $this->step++;
        // dd($this->step);
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submitForm()
    {
        $this->validate();
        // Process form submission, save data, etc.
    }
    
}
