<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
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
    public $imagePreview;
    public $published_at;
    public $featured = true;
    public $categories = [];
    public $allCategories = [];

    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'published_at' => 'required|date',
        'featured' => 'boolean',
        'categories' => 'required|array',
    ];


    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->content = $this->post->content;
        $this->imagePreview = $this->post->image ? Storage::url($this->post->image) : null;
        $this->published_at = $this->post->published_at->format('Y-m-d');
        $this->featured = $this->post->featured;
        $this->categories = $this->post->categories->pluck('id')->map(fn($id) => (int)$id)->toArray();
        $this->allCategories = Category::all();
    }

    public function unsetPhoto()
    {
        if ($this->post->image) {
            Storage::delete($this->post->image);
            $this->post->image = null;
            $this->imagePreview = null;
        }
    }


    public function update()
    {
        $this->validate();
        if ($this->image) {
            if ($this->post->image) {
                Storage::delete($this->post->image);
            }
            $this->post->image = $this->image->store('posts', 'public');
        }
        $this->rules['slug'] = 'required|unique:posts,slug,' . $this->post->id;

        $this->post->update([
            'user_id' => auth()->id(),
            'featured' => $this->featured,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'published_at' => $this->published_at,
            'image' => $this->post->image,
        ]);

        $this->post->categories()->sync($this->categories);

        session()->flash('success', 'Postagem atualizada com sucesso!');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.edit', [
            'allCategories' => $this->allCategories, // Todas as categorias disponíveis
        ]);
    }
}
