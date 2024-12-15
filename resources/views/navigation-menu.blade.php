<nav class="flex bg-white items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="header-left" class="flex items-center">
        <div class="text-gray-800 font-semibold">
            <x-application-mark />
        </div>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="{{route('blog')}}" :active="request()->routeIs('blog')">
                    {{__('Página Inicial')}}
                </x-nav-link>
                <x-nav-link href="{{route('posts.index')}}" :active="request()->routeIs('posts.index')">
                    {{__('Postagens')}}
                </x-nav-link>
                @auth
                    <x-nav-link href="{{route('dashboard')}}" :active="request()->routeIs('dashboard')">
                        {{__('Painel')}}
                    </x-nav-link>
                    {{-- <x-nav-link href="{{route('posts.show')}}" :active="request()->routeIs('posts.show')">
                        {{__('Posts')}}
                    </x-nav-link> --}}
                    <x-nav-link href="{{route('categories.show')}}" :active="request()->routeIs('categories.show')">
                        {{__('Categorias')}}
                    </x-nav-link>
                @endauth

            </div>
        </div>
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        @auth
            @include('components/header-right-auth')
        @else
            @include('components/header-right-guest')
        @endauth
    </div>
</nav>
