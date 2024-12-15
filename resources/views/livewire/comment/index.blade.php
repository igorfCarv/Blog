<div>
    <!-- Mensagem de sucesso -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulário para adicionar ou editar comentário -->
    <form wire:submit.prevent="{{ $commentId ? 'updateComment' : 'addComment' }}">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Comentário</label>
            <textarea id="content" wire:model="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">
            {{ $commentId ? 'Atualizar Comentário' : 'Adicionar Comentário' }}
        </button>
    </form>

    <!-- Exibir os comentários existentes -->
    <div class="mt-6">
        <h3 class="text-lg font-semibold">Comentários</h3>

        @foreach ($comments as $comment)
            <div class="mb-4 p-4 border rounded-md">
                <strong>{{ $comment->name }}</strong>
                <p>{{ $comment->content }}</p>
                <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>

                <!-- Botões de editar e excluir -->
                <div class="mt-2">
                    <button wire:click="editComment({{ $comment->id }})" class="text-blue-500">Editar</button>
                    <button wire:click="deleteComment({{ $comment->id }})" class="text-red-500 ml-4">Excluir</button>
                </div>
            </div>
        @endforeach

        <!-- Paginação dos comentários -->
        {{ $comments->links() }}
    </div>
</div>