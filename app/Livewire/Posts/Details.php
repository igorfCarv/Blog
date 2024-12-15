<?php

namespace App\Livewire\Posts;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Details extends Component
{
    public $post = []; // Instância do modelo Post
    public $comments;
    public $name;
    public $content;
    public $commentId; // Para armazenar o ID do comentário durante a edição
    public $isAuthor = false;


    protected $rules = [
        'name' => 'required|string|max:255', // Nome é necessário
        'content' => 'required|string', // Conteúdo é necessário
    ];

    public function mount($id)
    {
        $this->post = Post::with('comments')->findOrFail($id);
        $this->comments = Comment::where('post_id', $this->post->id)->latest()->get();

        // Verifica se o usuário logado é o autor do post
        $this->isAuthor = Auth::check() && Auth::user()->id === $this->post->user_id;

        // Opcional: verificar se o post é destacado
        if (!$this->post->featured) {
            return redirect()->route('dashboard')->with('error', 'Postagem não é destacada!');
        }
    }

    public function addComment()
    {
        // Se o usuário estiver autenticado, pega o nome dele
        if (Auth::check()) {
            $this->name = Auth::user()->name;
        } else {
            // Se o usuário não estiver autenticado, utiliza o nome fornecido
            $this->name = '';
        }

        // Valida os campos
        $this->validate();

        // Cria o comentário com o nome do usuário (ou "Visitante")
        Comment::create([
            'post_id' => $this->post->id,
            'name' => $this->name,
            'content' => $this->content,
        ]);

        // Limpa os campos após envio
        $this->name = '';
        $this->content = '';

        // Exibe uma mensagem de sucesso
        session()->flash('message', 'Comentário adicionado com sucesso!');
    }

    public function editComment($commentId)
    {
        // Encontra o comentário que será editado
        $comment = Comment::findOrFail($commentId);

        // Verifica se o usuário é o autor ou um administrador para editar
        if (Auth::check() && (Auth::user()->id === $comment->user_id || Auth::user()->is_admin)) {
            $this->commentId = $comment->id; // Armazena o ID do comentário
            $this->name = $comment->name;
            $this->content = $comment->content; // Preenche os campos de edição
        } else {
            session()->flash('error', 'Você não tem permissão para editar este comentário.');
        }
    }

    public function updateComment()
{
    $this->validate();

    $comment = Comment::findOrFail($this->commentId);

    if (!Auth::check() || (Auth::user()->id !== $comment->user_id && !Auth::user()->is_admin)) {
        session()->flash('error', 'Você não tem permissão para atualizar este comentário.');
        return;
    }

    $comment->update([
        'content' => $this->content,
    ]);

    $this->name = '';
    $this->content = '';
    $this->commentId = null;

    $this->comments = Comment::where('post_id', $this->post->id)->latest()->get();

    session()->flash('message', 'Comentário atualizado com sucesso!');
}

public function deleteComment($commentId)
{
    $comment = Comment::find($commentId);

    if (!Auth::check() || !$comment || (Auth::user()->id !== $comment->user_id && !Auth::user()->is_admin)) {
        session()->flash('error', 'Você não tem permissão para excluir este comentário.');
        return;
    }

    $comment->delete();

    $this->comments = Comment::where('post_id', $this->post->id)->latest()->get();

    session()->flash('message', 'Comentário excluído com sucesso!');
}

    public function render()
    {
        return view('livewire.posts.details', [
            // Carrega os comentários mais recentes, com paginação
            'comments' => $this->post->comments()->latest()->paginate(5),
        ]);
    }
}
