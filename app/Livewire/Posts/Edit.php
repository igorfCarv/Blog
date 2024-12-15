<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $slug;
    public $content;
    public $image;
    public $published_at;
    public $featured = false;
    public $categories = []; 

    protected $rules = [
        'title' => 'required',
        'slug' => 'required|unique:posts,slug', // Vamos ajustar o slug no método update
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'published_at' => 'required|date',
        'featured' => 'boolean',
        'categories' => 'required|array',
        'categories.*' => 'exists:categories,id',
    ];

    // Método para inicializar dados no momento de carregar o post
    public function mount($id)
    {
        // Carregar o post que estamos editando
        $this->post = Post::findOrFail($id);

        // Preencher os campos do post
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->content = $this->post->content;
        $this->published_at = $this->post->published_at->format('Y-m-d');
        $this->featured = $this->post->featured;
        $this->categories = Category::all();
        
    }

    // Método de atualização
    public function update()
    {
        // Ajuste da regra para o slug para permitir a atualização
        $this->rules['slug'] = 'required|unique:posts,slug,' . $this->post->id;

        // Validação
        $validatedData = $this->validate();

        if ($this->image) {
            $validatedData['image'] = $this->image->store('posts', 'public');
        }

        // Atualizar o post
        $this->post->update(array_merge($validatedData, [
            'user_id' => auth()->id(),
        ]));

        // Atualizar as categorias associadas ao post
        $this->post->categories()->sync($this->categories);

        session()->flash('success', 'Postagem atualizada com sucesso!');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        $categories = Category::all(); // Obter todas as categorias para exibição no formulário
        return view('livewire.posts.edit', compact('categories'));
    }
}
