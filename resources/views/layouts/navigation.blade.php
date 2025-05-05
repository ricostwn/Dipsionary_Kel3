<!-- Navigation -->
<nav class="bg-[#3C3B6E] fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
<<<<<<< HEAD
            <div class="flex">
                <!-- Logo -->
                <div>
                    <a href="{{ route('home') }}">
                        <img class="h-10" src="{{ asset('images/logo.png') }}" alt="Dipsionary Logo">
                    </a>
                </div>

                <!-- Navigation Links
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link
                        :href="route('home')"
                        :active="request()->routeIs('home')"
                        class="text-[#F9F5EA] hover:text-[#E0DBC9] hover:border-[#E0DBC9] transition-colors"
                        active-class="border-[#F9F5EA] text-[#F9F5EA]"
                    >
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                -->
            </div>

            <!-- Search -->
            <div class="flex-grow max-w-3xl w-full">
                <div class="relative h-10">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-[#414140]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" placeholder="Mau cari apa dips?"
                           class="w-full h-full pl-10 pr-4 rounded-lg bg-[#F9F5EA] text-[#414140] focus:ring-2 focus:ring-[#3C3B6E]">
                </div>
            </div>


=======
            <!-- Logo -->
            <div>
                <a href="/" class="flex items-center">
                    <img class="h-10" src="{{ asset('images/logo.png') }}" alt="Dipsionary Logo">
                </a>
            </div>

            <form action="{{ route('search') }}" method="GET" class="relative h-10 w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-[#414140]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="q" placeholder="Mau cari apa dips?"
                    class="w-full h-full pl-10 pr-4 rounded-lg bg-[#F9F5EA] text-[#414140] focus:ring-2 focus:ring-[#3C3B6E]">
            </form>
            
>>>>>>> 787b004 (routing, database, controller, model, dll)
            <!-- Icons -->
            <div class="flex items-center space-x-6">
                <!-- History -->
                <button class="text-[#F9F5EA] hover:text-white flex items-center justify-center h-10 w-10"
                        onclick="@auth window.location.href='{{ route('history') }}' @else showLoginAlert() @endauth">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>

                <!-- Bookmark -->
                <button class="text-[#F9F5EA] hover:text-white flex items-center justify-center h-10 w-10"
                        onclick="@auth window.location.href='{{ route('bookmark') }}' @else showLoginAlert() @endauth">
                    <svg class="h-8 w-8" fill="#F9F5EA" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                </button>

                <!-- Profile -->
                <div x-data="{ open: false }" class="relative">
<<<<<<< HEAD
                    <button @click="open = !open" class="text-[#F9F5EA] hover:text-white-300 flex items-center justify-center h-10 w-10">
                        <svg class="h-8 w-8" fill="#F9F5EA" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
=======
                    <button @click="open = !open" class="text-[#F9F5EA] hover:text-gray-300">
                        <svg class="h-8 w-8" fill="#F9F5EA" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
>>>>>>> 787b004 (routing, database, controller, model, dll)
                        <div class="py-1">
                            @auth
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
<<<<<<< HEAD

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#F9F5EA] hover:text-[#E0DBC9] hover:bg-[#4A477A] transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
=======
>>>>>>> 787b004 (routing, database, controller, model, dll)
            </div>
        </div>
    </div>
</nav>