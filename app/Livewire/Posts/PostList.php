<?php

namespace App\Livewire\Posts;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Category;
use App\Models\Post;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';  // Ordenação
    public $search = '';     // Busca por título
    public $categoryId = null; // ID da categoria para filtragem

    // Alterar a ordenação
    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    // Atualizar a busca por título
    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    // Método Computado para posts com a filtragem por categoria
    #[Computed]
    public function posts()
    {
        $query = Post::published()->orderBy('published_at', $this->sort)
            ->where('title', 'like', "%{$this->search}%");

        // Adiciona a filtragem por categoria se existir um valor em $categoryId
        if ($this->categoryId) {
            $query->whereHas('categories', function ($query) {
                $query->where('category_id', $this->categoryId);
            });
        }

        return $query->paginate(4);
    }

    // Método para alterar a categoria filtrada
    public function filterByCategory($categoryId)
    {
        $this->categoryId = $categoryId;  // Atualiza o ID da categoria
    }

    // Método para renderizar a view
    public function render()
    {
        $categories = Category::all();  // Pega todas as categorias

        return view('livewire.posts.post-list', compact('categories'));
    }
}
