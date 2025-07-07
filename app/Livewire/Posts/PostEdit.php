<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\Posts\PostForm;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    public function updatePost()
    {
        $this->form->update(); // Update method need create in PostForm
        session()->flash('success', 'Post updated successfully.');
        return redirect()->to('/posts');
        // time 35:25
    }

    public function render()
    {
        return view('livewire.posts.post-edit');
    }
}
