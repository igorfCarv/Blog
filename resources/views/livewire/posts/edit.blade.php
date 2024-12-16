<div>
    <form wire:submit.prevent="update" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" id="title" wire:model="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" wire:model="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo</label>
            <textarea id="content" wire:model="content" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            @if (!is_null($post['image']))
                <div class="col-md-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagem</label>
                    <p class="flex justify-content-between"><a href="{{asset('storage/'.$post['image'])}}">{{ $post['image'] }} </a>
                        <a wire:click.prevent="unsetPhoto"
                           onclick="alert('Atenção! O arquivo só será excluído quando você clicar no botão atualizar.')">
                            <img class="w-5" src="{{asset('image/bin.svg')}}" /> </a></p>
                </div>
            @else
                <div class="col-md-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagem</label>
                    <input type="file" id="image" wire:model="image" class="mt-1 block w-full" />
                    @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label for="published_at" class="block text-sm font-medium text-gray-700">Data de Publicação</label>
            <input type="date" id="published_at" wire:model="published_at" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            @error('published_at') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4 flex items-center">
            <input type="checkbox" id="featured" wire:model="featured" class="mr-2 border-gray-300 rounded shadow-sm" />
            <label for="featured" class="text-sm font-medium text-gray-700">Destacar post</label>
        </div>
        <div>
            <label for="categories">Categorias:</label>
            @foreach ($allCategories as $category)
                <div>
                    <input
                        type="checkbox"
                        id="category_{{ $category->id }}"
                        wire:model="categories"
                    value="{{ $category->id }}"
                    >
                    <label for="category_{{ $category->id }}">{{ $category->title }}</label>
                </div>
            @endforeach
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">
                Atualizar Post
            </button>
        </div>
    </form>
</div>
