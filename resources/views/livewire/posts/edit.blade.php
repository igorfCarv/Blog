<div>
    <form wire:submit.prevent="update" enctype="multipart/form-data">
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
        
            <!-- Exibir a imagem existente -->
            @if ($post->image && !$image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem Existente" class="h-24 w-24 object-cover">
                </div>
            @endif
        
            <!-- Exibir a pré-visualização da imagem carregada -->
            @if ($image)
                <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="h-24 w-24 object-cover">
                </div>
            @endif
        
            @error('image') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror
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
            <label class="text-gray-700 mb-2 block font-bold">Tags</label>
            <div class="flex flex-wrap gap-2">
              @foreach($categories as $category)
              <label class="inline-flex items-center">
                <input
                  type="checkbox"
                  wire:model="selectedTags"
                  value="{{ $category->id }}"
                  class="form-checkbox text-blue-600 h-5 w-5"
                />
                <span class="text-gray-700 ml-2">{{ $category->title }}</span>
              </label>
              @endforeach
            </div>
            @error('categories') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>

        <!-- Botão de Submissão -->
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">
                Atualizar Post
            </button>
        </div>
    </form>
</div>
