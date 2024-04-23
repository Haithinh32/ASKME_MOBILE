<header class="header">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center bg-white">
        <a href="{{ route('homepage') }}" class="text-white bg-red-500 font-bold px-4 py-2 rounded">ASKME MOBILE</a>
        
        <form class="flex items-center w-full md:w-auto" >
            <input type="text" name="search" placeholder="Search..."
                class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-red-500 focus:ring-1 mr-2">
            <button type="submit" class="text-red-500 hover:text-red-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                </svg>
            </button>
        </form>
        
        <nav class="navbar-brand">
            <ul class="flex space-x-4">
                <li class="nav-link"><a href="{{ route('homepage') }}" class="text-gray-700 hover:text-red-500">Home</a>
                </li>
                <li class="nav-link"><a href="#contact" class="text-gray-700 hover:text-red-500">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

