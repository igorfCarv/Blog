<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $post;
    public $title;
    public $slug;
    public $content;
    public $image;
    public $published_at;
    public $featured = false;


    protected $rules = [
        'title' => 'required',
        'slug' => 'required|unique:posts,slug',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'published_at' => 'required|date',
        'featured' => 'boolean',
    ];

    public function store(Request $request)
    {
        $validatedData = $this->validate();

        // Processar upload da imagem
        if ($this->image) {
            $validatedData['image'] = $this->image->store('posts', 'public');
        }

        // Criar o post
        Post::create(array_merge($validatedData, [
            'user_id' => auth()->id(),
        ]));

        // Feedback
        //$this->emit('notify', 'Postagem criada com sucesso!');

        // Redirecionar ou limpar o formulário
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
