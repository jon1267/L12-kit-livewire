<?php

namespace App\Livewire\Projects;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormModal extends Component
{
    #[Validate('required|string|max:255')]
    public $name = null;

    #[Validate('required|string|max:500')]
    public $description = null;

    #[Validate('required|string')]
    public $deadline = null;

    #[Validate('required|string')]
    public $status = 'pending';
    #[Validate('nullable|image|max:4096')]
    public $project_logo = null;

    public function saveProject()
    {
        // Validate the form data
        // time 33:00
        $validatedProject = $this->validate();
    }
    public function render()
    {
        return view('livewire.projects.form-modal');
    }
}
