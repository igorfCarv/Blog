<header class="flex items-center justify-between py-3 px-6 border-b border-gray-100">
    <div id="header-left" class="flex items-center">
        <div class="text-gray-800 font-semibold">
            <span class="text-yellow-500 text-xl">&lt;BLOG&gt;</span>
        </div>
        <div class="top-menu ml-10">
            <ul class="flex space-x-4">
                <li>
                    <a class="flex space-x-2 items-center hover:text-yellow-900 text-sm text-yellow-500"
                       href="http://127.0.0.1:8000">
                        Home
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                       href="http://127.0.0.1:8000/blog">
                        Blog
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                       href="http://127.0.0.1:8000/blog">
                        About Us
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                       href="http://127.0.0.1:8000/blog">
                        Contact Us
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-sm text-gray-500"
                       href="http://127.0.0.1:8000/blog">
                        Terms
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        @guest
            @include('components/header-right-guest')
        @endguest
        @auth
            @include('components/header-right-auth')
        @endauth
    </div>
</header>
