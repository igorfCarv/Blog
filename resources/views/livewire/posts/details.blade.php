<div class="container mx-auto py-6 px-4">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="relative">
            @if ($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="Imagem do Post" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">Sem imagem</span>
                </div>
            @endif
        </div>

        <div class="p-6">
            <h1 class="text-3xl font-semibold text-gray-900">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500 mb-4">{{ $post->slug }}</p>

            <div class="text-lg text-gray-700">
                {!! nl2br(e($post->content)) !!}
            </div>

            <div class="mt-6">
                <span class="inline-block text-sm text-gray-500">Publicado em: {{ $post->published_at->format('d/m/Y') }}</span>
            </div>

            @if($post->featured)
                <div class="mt-4">
                    <span class="inline-block px-4 py-2 text-sm text-white bg-blue-500 rounded-full">Destaque</span>
                </div>
            @endif

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700">Voltar para o Dashboard</a>
                <button wire:click="delete" class="text-red-500 hover:text-red-700">Excluir</button>
            </div>
        </div>
    </div>
</div>
