<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public function render(): View
    {
        return view('livewire.posts.show',
            [
            'posts' => Post::take(5)->get()
        ]);
    }
}
