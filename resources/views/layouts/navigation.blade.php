<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                {{-- quicksell logo --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('welcome') }}" class="flex items-center space-x-2 group">
                                <div
                                    class="bg-indigo-600 p-1.5 rounded-lg shadow-lg group-hover:bg-indigo-500 transition duration-200">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>

                                <span class="text-2xl font-black tracking-tighter text-gray-900 uppercase">
                                    Quick<span class="text-indigo-600">Sell</span>
                                </span>
                            </a>
                        </div>
                    </a>
                </div>

                {{-- nav --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')"
                        class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                        Home
                    </x-nav-link>
                    @auth

                        @if (Auth::user()->role_id !== 1)
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                                Dashboard
                            </x-nav-link>
                        @endif

                        @if (Auth::user()->role_id == 1)
                            <x-nav-link :href="route('admin.moderation.index')" :active="request()->routeIs('admin.moderation.*')"
                                class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                                Admin Panel
                            </x-nav-link>
                        @endif

                        @if (Auth::user()->role_id == 2)
                            <x-nav-link :href="route('admin.moderation.index')" :active="request()->routeIs('admin.moderation.*')"
                                class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                                Ad Moderation
                            </x-nav-link>
                        @endif

                        @if (Auth::user()->role_id == 1)
                            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index.*')"
                                class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                                Categories
                            </x-nav-link>
                        @endif

                        @if (Auth::user()->role_id == 1)
                            <x-nav-link :href="route('locations.index')" :active="request()->routeIs('locations.index.*')"
                                class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                                Locations
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">
                @if (!auth()->check() || auth()->user()->role_id !== 1)
                    <a href="{{ route('advertisements.create') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-indigo-600 border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition shadow-md hover:shadow-lg">
                        Post Your Ad
                    </a>
                @endif

                @auth
                    <div class="border-l pl-6 border-gray-200">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Log Out
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="border-l pl-6 border-gray-200">
                        <a href="{{ route('login') }}"
                            class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">Login</a>
                    </div>
                @endauth
            </div>

            {{-- dropdown icon --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


    {{-- responsive nav --}}
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">Home</x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>

                @if (Auth::user()->role_id == 1)
                    <x-responsive-nav-link :href="route('admin.moderation.index')" :active="request()->routeIs('admin.moderation.*')">
                        Admin Panel
                    </x-responsive-nav-link>
                @endif

                @if (Auth::user()->role_id == 2)
                    <x-responsive-nav-link :href="route('admin.moderation.index')" :active="request()->routeIs('admin.moderation.*')"
                        class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                        Ad Moderation
                    </x-responsive-nav-link>
                @endif

                @if (Auth::user()->role_id == 1)
                    <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index.*')">
                        Categories
                    </x-responsive-nav-link>
                @endif

                @if (Auth::user()->role_id == 1)
                    <x-responsive-nav-link :href="route('locations.index')" :active="request()->routeIs('locations.index.*')"
                        class="text-sm font-black text-gray-600 hover:text-indigo-600 uppercase tracking-wider">
                        Locations
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 space-y-1">
                    <x-responsive-nav-link :href="route('login')">Log in</x-responsive-nav-link>
                </div>

            @endauth
        </div>
    </div>
</nav>
