<header class="header">
    <div class="container mx-auto px-4 py-2 flex flex-col md:flex-row justify-center items-center bg-white">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center bg-white">
            <a href="{{ route('homepage') }}" class="text-white bg-red-500 font-bold px-4 py-2 rounded">ASKME MOBILE</a>

            <form class="flex items-center w-full md:w-auto" action="{{ route('homepage') }}" method="GET">
                <input type="text" name="search" placeholder="Search..." class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-red-500 focus:ring-1 mr-2">
                <button type="submit" class="text-red-500 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                    </svg>
                </button>
            </form>
            <nav class="navbar-brand inline-flex">
                <a href="{{route('compare')}}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    <i class="fa-duotone fa-arrow-right-arrow-left"></i>
                    Compare
                </a>
                <a href="{{ route('homepage') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Home</a>
                <a href="#contact" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Contact</a>
                @if (Route::has('login'))
                <nav class="flex items-center space-x-2">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                    </a>
                    @if (Route::has('register'))
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-button>
                            {{ __('Log out') }}
                        </x-button>
                    </form>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700 hover:text-black">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-3 py-2 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700 hover:text-black">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </nav>
        </div>
</header>