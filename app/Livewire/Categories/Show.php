<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class Show extends Component
{
    use WithPagination;
    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);

            // Excluir a categoria
            $category->delete();
           
            // Exibir mensagem de sucesso
            session()->flash('message', 'Categoria excluída com sucesso!');
            // Redirecionar para a lista de categorias
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            // Exibir mensagem de erro caso algo dê errado
            session()->flash('error', 'Erro ao excluir categoria: ' . $e->getMessage());
        }
    }
    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.categories.show', compact('categories'));
    }
}
