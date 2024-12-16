<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

#[AllowDynamicProperties] class Dashboard extends Component
{
    public $posts;
    public $categories;
    public function mount()
    {
        $this->posts = Post::where('user_id', auth()->id())->latest()->get();
        $this->categories = Category::all();
    }

    public function delete($id)
    {
        // Encontrar o post pelo ID
        $post = Post::findOrFail($id);

        // Verificar se o post possui uma imagem associada
        if ($post->image) {
            // Remover a imagem do armazenamento público
            \Storage::delete('public/' . $post->image);
        }

        // Excluir o post do banco de dados
        $post->delete();

        // Feedback para o usuário
        session()->flash('success', 'Post deletado com sucesso!');

        // Redirecionar para uma lista de posts ou outra rota
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
