<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $post;
    public $name;
    public $content;
    public $commentId; // Para edição de comentário

    protected $rules = [
        'name' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    // Método para carregar os dados do post e iniciar variáveis
    public function mount(Post $post)
    {
        $this->post = $post;
    }

    // Método para adicionar um comentário
    public function addComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'name' => $this->name,
            'content' => $this->content,
        ]);

        // Limpar os campos após envio
        $this->name = '';
        $this->content = '';

        // Mostrar a mensagem de sucesso
        session()->flash('message', 'Comentário adicionado com sucesso!');

        // Emite o evento para atualizar os comentários
        $this->emit('commentAdded');
    }

    // Método para excluir um comentário
    public function deleteComment($id)
    {
        $comment = Comment::find(Request()->$id);
        $comment->delete();

        session()->flash('message', 'Comentário excluído com sucesso!');
    }

    // Método para editar o comentário
    public function editComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $this->commentId = $comment->id;
        $this->name = $comment->name;
        $this->content = $comment->content;
    }

    // Método para salvar o comentário editado
    public function updateComment()
    {
        $this->validate();

        $comment = Comment::findOrFail($this->commentId);
        $comment->update([
            'name' => $this->name,
            'content' => $this->content,
        ]);

        // Limpar os campos após a atualização
        $this->name = '';
        $this->content = '';
        $this->commentId = null;

        session()->flash('message', 'Comentário atualizado com sucesso!');
    }

    // Renderizar os comentários e o formulário de adição
    public function render()
    {
        return view('livewire.comment-component', [
            'comments' => $this->post->comments()->latest()->paginate(5),
        ]);
    }
}
