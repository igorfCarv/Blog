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
    public $categories = []; // IDs das categorias selecionadas

    protected $rules = [
        'title' => 'required',
        'slug' => 'required|unique:posts,slug',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'published_at' => 'required|date',
        'featured' => 'boolean',
        'categories' => 'required|array' // Certifica que é um array
        
    ];

    // Método mount() para carregar categorias ao inicializar o componente
    public function mount()
    {
        // Carrega todas as categorias ao inicializar o componente
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
        $post->categories()->sync($this->categories);

        // Feedback para o usuário
        session()->flash('success', 'Postagem criada com sucesso!');
    
        // Redirecionar ou limpar formulário
        return redirect()->route('dashboard');
    }

    // Renderiza a view com as categorias disponíveis
    public function render()
    {
        // Carrega as categorias
        $categories = Category::all();
        
        // Passa para a view as categorias carregadas
        return view('livewire.posts.create', compact('categories'));
    }
}
