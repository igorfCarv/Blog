<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $content;
    public $image;
    public $published_at;
    public $featured = false;
    public $categories = []; // Todas as categorias disponíveis
    public $selectedTags = []; // IDs das categorias selecionadas

    protected $rules = [
        'title' => 'required',
        'slug' => 'required|unique:posts,slug',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'published_at' => 'required|date',
        'featured' => 'boolean',
        'selectedTags' => 'required|array|min:1', // Deve ser um array com pelo menos 1 item
        'selectedTags.*' => 'exists:categories,id', // Cada item deve ser um ID válido
    ];

    public function mount()
    {
        // Carregar todas as categorias disponíveis
        $this->categories = Category::all();
    }

    public function store()
    {
        // Validação
        $validatedData = $this->validate();

        // Processar upload da imagem, se necessário
        if ($this->image) {
            $validatedData['image'] = $this->image->store('posts', 'public');
        }

        // Criar o post
        $post = Post::create(array_merge($validatedData, [
            'user_id' => auth()->id(),
        ]));
        

        // Associar as categorias ao post, passando apenas os IDs selecionados
        $post->categories()->sync($this->selectedTags);

        // Feedback para o usuário
        session()->flash('success', 'Postagem criada com sucesso!');

        // Redirecionar
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.posts.create', [
            'categories' => $this->categories,
        ]);
    }
}