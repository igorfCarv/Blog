<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Request;

class Edit extends Component
{
    public $category; // Instância do modelo Category

    public $categories;
    public $title;
    public $slug;
    public $text_color;
    public $bg_color;

    protected $rules;

    // Inicializa o componente, carregando a categoria para edição
    public function mount()
    {
        // Buscar a categoria pelo ID
        $this->category = Category::find(Request()->id);
        $this->categories = $this->category->toArray();


        // Inicializa as variáveis com os dados da categoria
        $this->title = $this->categories['title'];
        $this->slug = $this->categories['slug'];
        $this->text_color = $this->categories['text_color'];
        $this->bg_color = $this->categories['bg_color'];

        // Definindo regras de validação
        $this->rules = [
            'title' => 'required',
            'slug' => 'nullable|string|unique:categories,slug,',
            'text_color' => 'required|string|regex:/^#[0-9a-fA-F]{6}$/', // Validação para cores hexadecimais
            'bg_color' => 'required|string|regex:/^#[0-9a-fA-F]{6}$/', // Validação para cores hexadecimais
        ];
    }

    // Atualiza o slug automaticamente quando o título é alterado
    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    // Método para atualizar a categoria
    public function update()
    {

        // Atualizar a categoria
        $this->category->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'text_color' => $this->text_color,
            'bg_color' => $this->bg_color,
        ]);

        // Feedback de sucesso
        session()->flash('success', 'Categoria atualizada com sucesso!');

        // Redirecionar para a lista de categorias
        return redirect()->route('dashboard');
    }
    // Função para renderizar a view
    public function render()
    {
        return view('livewire.categories.edit');
    }
}
