<div class="mx-auto p-6 my-4 bg-white rounded-lg shadow-md ">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-700">Categorias</h1>
    </div>
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Título</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Slug</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Texto</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Fundo</th>
                    <th class="px-6 py-3 text-center text-sm font-medium text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-t border-gray-200">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $category->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $category->slug }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <span class="inline-block px-3 py-1 rounded-md"
                                  style="background-color: {{ $category->text_color }}; color: white;">
                                Texto
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <span class="inline-block px-3 py-1 rounded-md"
                                  style="background-color: {{ $category->bg_color }}; color: black;">
                                Fundo
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-center">
                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium mr-2">Editar</a>
                            <button wire:click="delete({{ $category->id }})"
                                    class="text-red-600 hover:text-red-800 font-medium">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            Nenhuma categoria encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $categories->links() }}
    </div>
    <div class="mt-6 text-right">
        <a href="{{ route('categories.create') }}"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            Criar Nova Categoria
        </a>
    </div>
</div>
