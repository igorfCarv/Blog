<div>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        @csrf

        <!-- Título -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" id="title" wire:model="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Slug -->
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" wire:model="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Conteúdo -->
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo</label>
            <textarea id="content" wire:model="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Imagem -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Imagem</label>
            <input type="file" id="image" wire:model="image" class="mt-1 block w-full" />
            @if ($image)
                <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="h-24 w-24 object-cover">
                </div>
            @endif
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Data de Publicação -->
        <div class="mb-4">
            <label for="published_at" class="block text-sm font-medium text-gray-700">Data de Publicação</label>
            <input type="date" id="published_at" wire:model="published_at" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('published_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Destaque -->
        <div class="mb-4 flex items-center">
            <input type="checkbox" id="featured" wire:model="featured" class="mr-2 border-gray-300 rounded shadow-sm" />
            <label for="featured" class="text-sm font-medium text-gray-700">Destacar post</label>
        </div>

        <!-- Categorias -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Categorias</label>
            <div class="mt-2 space-y-2">
                @foreach($categories as $category)
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="category_{{ $category->id }}" 
                            value="{{ $category->id }}" 
                            wire:model="categories" 
                            class="h-4 w-4 border-gray-300 rounded text-blue-600 focus:ring-blue-500"
                        >
                        <label for="category_{{ $category->id }}" class="ml-2 text-sm text-gray-700">
                            {{ $category->title }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('categories') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        {{$errors}}

        <!-- Botão de Submissão -->
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">
                Criar Post
            </button>
        </div>
    </form>
</div>
