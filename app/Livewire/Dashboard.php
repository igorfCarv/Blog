<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Post;
use Livewire\Component;

#[AllowDynamicProperties] class Dashboard extends Component
{
    public $posts;
    public function mount(){
        $this->posts = Post::where('user_id', auth()->id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
