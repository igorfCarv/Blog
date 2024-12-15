<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-xl font-bold mb-6">Editar Categoria</h1>

    <!-- Feedback de sucesso -->
    @if (session()->has('success'))
        <div class="mb-4 text-green-700 bg-green-100 p-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário -->
    <form wire:submit.prevent="update">
        <!-- Título -->
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700">Título</label>
            <input type="text" id="title" wire:model="title"
                class="block w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Slug -->
        <div class="mb-4">
            <label for="slug" class="block font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" wire:model="slug"
                class="block w-full mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('slug') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Cor do Texto -->
        <div class="mb-4">
            <label for="text_color" class="block font-medium text-gray-700">Cor do Texto</label>
            <input type="color" id="text_color" wire:model="text_color"
                class="block w-16 h-10 mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('text_color') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Cor de Fundo -->
        <div class="mb-4">
            <label for="bg_color" class="block font-medium text-gray-700">Cor de Fundo</label>
            <input type="color" id="bg_color" wire:model="bg_color"
                class="block w-16 h-10 mt-1 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('bg_color') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Botão -->
        <div class="mt-6">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Atualizar Categoria
            </button>
        </div>
    </form>
</div>
