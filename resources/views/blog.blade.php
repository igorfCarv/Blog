@extends('layouts.guest')
@section('content')
    <div class="w-full text-center py-32">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
            Bem-vindo ao <span class="text-emerald-600">&lt;BLOG&gt;</span> <span class="text-gray-900"> </span>
        </h1>
        <p class="text-gray-500 text-lg mt-1">Desafio Laravel Dev Web</p>
    </div>
    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-emerald-600 font-bold">Postagem em destaque</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                        <div class="md:col-span-1 col-span-3">
                            <x-posts.posts-card :post="$post" />
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-emerald-600 font-semibold"
               href="{{route('posts.index')}}">Veja Mais</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-emerald-600 font-bold">Últimas postagens</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <div class="md:col-span-1 col-span-3">
                        <x-posts.posts-card :post="$post" />
                    </div>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-emerald-600 font-semibold" href="{{route('posts.index')}}">Veja Mais</a>
    </div>
@endsection
