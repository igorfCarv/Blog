<div>
    <section class="flex flex-col">
        <h2 class="text-lg font-bold my-3"> Bem-vindo Igor! </h2>

        <div class="flex gap-2">
            <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-semibold mb-2 text-blue-600">Quantidade de Postagens:</h3>
                    <p class="text-lg text-gray-700">{{ count($posts) }}</p>
                </div>
                <p class="text-gray-900 text-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam
                    justo nec justo lacinia, vel ullamcorper nibh tincidunt.</p>
                <a href="{{ route('posts.create') }}">Criar novo post</a>
            </div>
            <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-green-600">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-semibold mb-2 text-blue-600">Quantidade de Categorias:</h3>
                    <p class="text-lg text-gray-700">{{ count($categories) }}</p>
                </div>
                <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam justo
                    nec justo lacinia, vel ullamcorper nibh tincidunt.</p>
                <a href="{{ route('categories.create') }}">Criar nova categoria</a>
            </div>
        </div>

        <h4 class="text-lg font-medium my-3">Veja suas últimas postagens:</h4>
        @if ($posts->isEmpty())
            <p>Você ainda não criou nenhuma postagem.</p>
        @else
            <ul class="space-y-4">
                @foreach ($posts as $post)
                    <li class="p-4 border rounded-lg shadow">
                        <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                        <p class="text-gray-600">{{ $post->content }}</p>
                        <small class="text-gray-500">Publicado em: {{ $post->published_at }}</small>
                        <a href="{{ route('posts.edit', $post->id) }}">Editar Postagem</a>
                        <button onclick="confirm('Tem certeza que deseja deletar?') || event.stopImmediatePropagation()"
                            wire:click="delete({{ $post->id }})" class="text-red-500 hover:underline">
                            Deletar
                        </button>
                    </li>
                @endforeach
            </ul>

        @endif
    </section>
</div>
