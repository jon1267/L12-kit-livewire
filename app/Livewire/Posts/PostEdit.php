<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\Posts\PostForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public function updatePost()
    {
        $this->form->update(); // Update method need create in PostForm
        return redirect()->to('/posts');
        // time 35:25
    }

    public function render()
    {
        return view('livewire.posts.post-edit');
    }
}
