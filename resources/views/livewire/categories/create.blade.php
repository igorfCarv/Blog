<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <form wire:submit.prevent="store" class="space-y-6">
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Título -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" id="title" wire:model="title" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-500 @enderror">
            @error('title') 
                <span class="text-sm text-red-500">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" wire:model="slug" readonly
                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm sm:text-sm @error('slug') border-red-500 @enderror">
            @error('slug') 
                <span class="text-sm text-red-500">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Cor do Texto -->
        <div>
            <label for="text_color" class="block text-sm font-medium text-gray-700">Cor do Texto</label>
            <input type="color" id="text_color" wire:model="text_color"
                class="mt-2 h-10 w-16 border-none cursor-pointer rounded-md shadow-sm @error('text_color') border-red-500 @enderror">
            @error('text_color') 
                <span class="text-sm text-red-500">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Cor de Fundo -->
        <div>
            <label for="bg_color" class="block text-sm font-medium text-gray-700">Cor de Fundo</label>
            <input type="color" id="bg_color" wire:model="bg_color"
                class="mt-2 h-10 w-16 border-none cursor-pointer rounded-md shadow-sm @error('bg_color') border-red-500 @enderror">
            @error('bg_color') 
                <span class="text-sm text-red-500">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Botão -->
        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Criar Categoria
            </button>
        </div>
    </form>
</div>
