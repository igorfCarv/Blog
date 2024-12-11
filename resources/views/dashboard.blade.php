<x-app-layout>
    <section class="flex flex-col">
    <h2> Bem-vindo Igor! </h2>

    <div class="flex gap-2">
        <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
            <h3 class="text-2xl font-semibold mb-2 text-blue-600">Quantidade de Postagens:</h3>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam justo nec justo lacinia, vel ullamcorper nibh tincidunt.</p>
            <a href="{{route('posts.create')}}">Criar novo post</a>
        </div>
        <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-green-600">
            <h3 class="text-2xl font-semibold mb-2 text-blue-600">Quantidade de Categorias:</h3>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam justo nec justo lacinia, vel ullamcorper nibh tincidunt.</p>
            <a href="{{route('posts.create')}}">Criar nova categoria</a>
        </div>
    </div>

    <h4>Veja suas últimas postagens</h4>
    </section>

</x-app-layout>
