<?php

namespace App\Livewire\Projects;

use App\Services\ProjectService;
use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class FormModal extends Component
{
    use WithFileUploads;

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

    public $projectId = null;
    public $isView = false; // mode: 'view' or 'edit'
    public $existingImage = null;

    public function saveProject(ProjectService $projectService)
    {
        // Validate the form data
        $validatedProjectRequest = $this->validate();

        $projectService->saveProject($validatedProjectRequest);

        $this->reset();

        $this->dispatch('flash', [
            'message' => 'Project created successfully!',
            'type' => 'success',
        ]);

        Flux::modal('project-modal')->close();
    }

    #[On('open-project-modal')]
    public function projectDetail(string $mode, $project = null)
    {
        //dd($mode, $project);

        $this->isView = $mode === 'view';

        if ($mode === 'create') {
            $this->isView = false;
            $this->reset();
        } else {
            $this->projectId = $project['id'];

            $this->name = $project['name'];
            $this->description = $project['description'];
            $this->deadline = $project['deadline'];
            $this->status = $project['status'];
            $this->existingImage = $project['project_logo'];
           // $this->project_logo  = $project['project_logo'];
        }
    }

    public function render()
    {
        return view('livewire.projects.form-modal');
    }
}
