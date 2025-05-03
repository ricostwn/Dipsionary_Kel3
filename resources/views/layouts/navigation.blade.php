@php
    $isHistoryPage = request()->routeIs('history');
@endphp

<nav x-data="{ open: false }" class="bg-[#3C3B6E] border-b border-[#2E2C54] fixed w-full z-10">
    <!-- Primary Navigation Menu -->
<div class="min-h-screen bg-[#F9F5EA]">
    <div class="bg-[#3C3B6E] fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
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
            <div class="flex-grow max-w-3xl mx-4"> <!-- Tambahkan mx-4 dan hapus w-full -->
                    <div class="relative h-10 w-full"> <!-- Tambahkan w-full di sini -->
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


            <!-- Icons -->
            <div class="flex items-center space-x-6">
                <!-- Old History
                <button class="text-[#F9F5EA] hover:text-white flex items-center justify-center h-10 w-10"
                        onclick="@auth window.location.href='{{ route('history') }}' @else showLoginAlert() @endauth">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
                -->

                <!-- Responsive History -->
                <button class="{{ $isHistoryPage ? 'text-white border-b-2 border-white' : 'text-[#F9F5EA] hover:text-white' }} flex items-center justify-center h-10 w-10"
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

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-[#F9F5EA] hover:text-[#E0DBC9] transition-colors">
                            <div>{{ Auth::user()->name ?? 'Guest' }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-[#F9F5EA]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Profile -->
                        <x-dropdown-link
                            :href="route('profile.edit')"
                            class="text-[#3C3B6E] hover:bg-[#F9F5EA]"
                        >
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link
                                as="button"
                                class="text-[#3C3B6E] hover:bg-[#F9F5EA]"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#F9F5EA] hover:text-[#E0DBC9] hover:bg-[#4A477A] transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#3C3B6E]">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link
                :href="route('home')"
                :active="request()->routeIs('home')"
                class="text-[#F9F5EA] hover:bg-[#4A477A]"
                active-class="bg-[#4A477A]"
            >
                {{ __('Home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#4A477A]">
            <div class="px-4">
                <div class="font-medium text-base text-[#F9F5EA]">{{ Auth::user()->name ?? 'Guest' }}</div>
                <div class="font-medium text-sm text-[#E0DBC9]">{{ Auth::user()->email ?? '' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link
                    :href="route('profile.edit')"
                    class="text-[#F9F5EA] hover:bg-[#4A477A]"
                >
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link
                        as="button"
                        class="text-[#F9F5EA] hover:bg-[#4A477A]"
                    >
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
</nav>
