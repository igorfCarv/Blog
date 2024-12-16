<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public $categories;
    public $categoryId = null;
    public $posts;

    public function mount()
    {
        // Carrega todas as categorias e os posts ao inicializar o componente
        $this->categories = Category::all();
        $this->loadPosts();
    }

    // Carrega os posts, aplicando o filtro por categoria se necessário
    public function loadPosts()
    {
        if ($this->categoryId) {
            // Filtra os posts pela categoria, se houver categoria selecionada
            $this->posts = Post::whereHas('categories', function ($query) {
                $query->where('category_id', $this->categoryId);
            })
                ->where('user_id', auth()->id())
                ->latest()
                ->get();
        } else {
            // Carrega todos os posts do usuário se não houver categoria selecionada
            $this->posts = Post::where('user_id', auth()->id())
                ->latest()
                ->get();
        }
    }

    // Método para filtrar os posts pela categoria
    public function filterByCategory($categoryId)
    {
        $this->categoryId = $categoryId;  // Atualiza o ID da categoria
        $this->loadPosts();  // Recarrega os posts com a categoria filtrada
    }

    // Método para renderizar a view com os dados
    public function render(): View
    {
        return view('livewire.posts.show', [
            'posts' => $this->posts,
            'categories' => $this->categories,  // Passa as categorias para a view
        ]);
    }
}
