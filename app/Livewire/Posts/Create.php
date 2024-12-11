<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class Create extends Component
{
    public $post;
    public function render()
    {
        return view('livewire.posts.create');
    }
}
