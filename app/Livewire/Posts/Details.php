<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class Details extends Component
{
    public $post; // Instância do modelo Post

    public function mount($id)
    {
        // Busca a postagem pelo ID
        $this->post = Post::findOrFail($id);

        // Verifica se o post está marcado como featured (destaque)
        if (!$this->post->featured) {
            // Se não for destaque, redireciona para o dashboard ou outra página
            return redirect()->route('dashboard')->with('error', 'Postagem não é destacada!');
        }
    }

    public function render()
    {
        return view('livewire.posts.show');
    }
}
