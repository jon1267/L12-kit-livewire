<?php

namespace App\Livewire\Forms\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post;
    public $title = '';
    public $content = '';
    public $image;

    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

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

    public function update()
    {
        $data = $this->validate([
            'title' =>   ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' =>   ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,svg' ,'max:2048'], // Optional image validation
        ]);
        $data['slug'] = str()->slug($data['title']);
        $data['image'] = $this->post->image;

        if ($this->image) {
            Storage::disk('public')->delete($this->post->image);
            $data['image'] = $this->image->store('posts', 'public');
        }

        $this->post->update($data);
        $this->reset();
    }
}
