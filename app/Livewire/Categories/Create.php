<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class Create extends Component
{
    public $title;
    public $slug;
    public $text_color = '#000000'; // Cor padrão
    public $bg_color = '#ffffff';  // Cor padrão
    protected $rules = [
        'title' => 'required|string|max:255|unique:categories,title',
        'slug' => 'nullable|string|unique:categories,slug',
        'text_color' => 'required|string|regex:/^#[0-9a-fA-F]{6}$/',
        'bg_color' => 'required|string|regex:/^#[0-9a-fA-F]{6}$/',
    ];

    public function updatedTitle()
    {
        // Atualizar o slug automaticamente ao alterar o título
        $this->slug = Str::slug($this->title);
    }
    public function store()
    {
        $this->validate();

        Category::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'text_color' => $this->text_color,
            'bg_color' => $this->bg_color,
        ]);

        // Resetar os campos após salvar
        $this->reset(['title', 'slug', 'text_color', 'bg_color']);

        // Feedback para o usuário
        session()->flash('success', 'Categoria criada com sucesso!');
    }

    public function render()
    {
        return view('livewire.categories.create');
    }

}
