<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $post; // Instância do modelo Post
    public $title;
    public $slug;
    public $content;
    public $image;
    public $published_at;
    public $featured = false;

    public $currentImage; // Imagem atual (para exibição durante a edição)

    protected $rules = [
        'title' => 'required',
        'slug' => 'required|unique:posts,slug',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'published_at' => 'required|date',
        'featured' => 'boolean',
    ];

    public function mount($id)
    {
        // Busca a postagem e atribui à propriedade $post
        $this->post = Post::findOrFail($id);

        // Inicializa as propriedades com os dados da postagem
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->content = $this->post->content;
        $this->currentImage = $this->post->image;
        $this->published_at = $this->post->published_at->format('Y-m-d');
        $this->featured = $this->post->featured;
    }

    public function update()
    {
        // Ajusta as regras para validar o slug, ignorando o atual
        $this->rules['slug'] = 'required|unique:posts,slug,' . $this->post->id;

        // Valida os dados
        $validatedData = $this->validate();

        // Processa o upload da nova imagem, se houver
        if ($this->image) {
            $validatedData['image'] = $this->image->store('posts', 'public');
        }

        // Atualiza a postagem no banco de dados
        $this->post->update(array_merge($validatedData, [
            'user_id' => auth()->id(),
        ]));

        // Notificação e redirecionamento
        //$this->emit('notify', 'Postagem atualizada com sucesso!');
        return redirect()->route('dashboard');
    }
    public function delete()
    {
        // Verifica se há uma imagem associada e remove do armazenamento
        if ($this->post->image && Storage::disk('public')->exists($this->post->image)) {
            Storage::disk('public')->delete($this->post->image);
        }

        // Exclui a postagem do banco de dados
        $this->post->delete();

        // Notificação e redirecionamento após exclusão
        session()->flash('message', 'Postagem excluída com sucesso!');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }
}
