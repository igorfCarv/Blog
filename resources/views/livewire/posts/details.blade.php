<div class="post-details flex lg:flex-row md:flex-col sm:flex-col gap-3">
    <!-- Imagem do Post -->
    <div class="post-image">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
            class="w-full h-2/4 object-cover rounded-xl">
    </div>

    <!-- Título e Meta do Post -->
    <div class="w-2/4">
        <div class="post-meta mt-5">
            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500">Publicado em {{ $post->published_at->format('d/m/Y') }}</p>
            <p class="text-sm text-gray-500">Autor: {{ $post->author->name }}</p>
        </div>

        <!-- Conteúdo do Post -->
        <div class="post-content mt-5 text-lg text-gray-700">
            {!! nl2br(e($post->content)) !!}
        </div>

        @foreach ($post->categories as $item)
        <span href="{{route('posts.details', $post->id)}}" class="

            rounded-xl px-3 py-1 my-1 text-sm mr-3" style="background-color: {{ $item->bg_color }}; color: {{ $item->text_color }} ">
                {{ $item->title }}
        </span>
        @endforeach

        @if ($comments->count() > 0)
            <div class="comments-section mt-10">
                <h2 class="text-xl font-bold">Comentários</h2>
                @foreach ($comments as $comment)
                    <div class="comment mt-3 p-3 bg-gray-100 rounded-md">
                        <p><strong>{{ $comment->name }}:</strong> {{ $comment->content }}</p>
                        <p class="text-sm text-gray-500">Publicado em {{ $comment->created_at->format('d/m/Y H:i') }}
                        </p>
                        @if ($isAuthor)
                            <div class="mt-2">
                                <button wire:click="editComment({{ $comment->id }})" class="text-blue-500">Editar</button>
                                <button wire:click="deleteComment({{ $comment->id }})" class="text-orange-800 ml-4">Excluir</button>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- <!-- Paginação de comentários -->
        {{ $comments->links() }} --}}
        @else
            <p class="text-gray-500 mt-4">Ainda não existem comentários.</p>
        @endif
        <div class="add-comment mt-8">
            <h3 class="text-lg font-bold">Adicionar Comentário</h3>

            <!-- Formulário para Criar Comentário -->
            <form wire:submit.prevent="addComment">
                @auth
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" id="name" wire:model="name"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="{{ Auth::user()->name }}" disabled />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                @endauth
                @guest
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" id="name" wire:model="name"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                @endguest
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Comentário</label>
                    <textarea id="content" wire:model="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                        rows="4"></textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">
                        Adicionar Comentário
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>
