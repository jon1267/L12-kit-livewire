<?php

namespace App\Livewire\Forms\Posts;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public $title = '';
    public $content = '';
    public $image;

    public function store()
    {
        $data = $this->validate([
            'title' =>   ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' =>   ['required', 'image', 'mimes:jpeg,jpg,png,gif,svg' ,'max:2048'], // Optional image validation
        ]);
        $data['slug'] = str()->slug($data['title']);
        if ($this->image) {
            $data['image'] = $this->image->store('posts', 'public');
        }

        auth()->user()->posts()->create($data);
        $this->reset();
    }
}
