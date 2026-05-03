<x-app-layout>
    <div class="bg-gradient-to-r from-indigo-700 to-purple-800 py-20 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight">
                Buy & Sell Everything <br><span class="text-indigo-200">Faster with QuickSell</span>
            </h1>
            <p class="text-indigo-100 text-lg mb-10 max-w-2xl mx-auto">
                Find Anything in Sri Lanka
            </p>

            <div class="max-w-3xl mx-auto">
                <form action="{{ route('public.search') }}" method="GET" class="relative">
                    <input type="text" name="query" value="{{ request('query') }}"
                        placeholder="What are you looking for ?"
                        class="w-full pl-6 pr-32 py-5 rounded-full border-none shadow-2xl focus:ring-4 focus:ring-indigo-300 text-lg">
                    <button type="submit"
                        class="absolute right-3 top-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-bold transition duration-200">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- browse by category --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-lg font-black text-gray-900 tracking-tighter">
                    Browse by Category
                </h2>
                <p class="text-sm text-gray-500 font-medium"></p>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
            <a href="{{ route('public.search', ['category' => 1]) }}"
                class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition duration-300 text-center">
                <div
                    class="bg-blue-50 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </div>
                <span class="block font-bold text-gray-800 text-xs">Vehicles</span>
                <span class="text-[10px] text-gray-400 font-medium">150 ads</span>
            </a>

            <a href="{{ route('public.search', ['category' => 2]) }}"
                class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition duration-300 text-center">
                <div
                    class="bg-orange-50 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="block font-bold text-gray-800 text-xs">Electronics</span>
                <span class="text-[10px] text-gray-400 font-medium">1,240 ads</span>
            </a>

            <a href="{{ route('public.search', ['category' => 3]) }}"
                class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition duration-300 text-center">
                <div
                    class="bg-green-50 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <span class="block font-bold text-gray-800 text-xs">Property</span>
                <span class="text-[10px] text-gray-400 font-medium">310 ads</span>
            </a>

            <a href="{{ route('public.search', ['category' => 5]) }}"
                class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition duration-300 text-center">
                <div
                    class="bg-purple-50 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="block font-bold text-gray-800 text-xs">Jobs</span>
                <span class="text-[10px] text-gray-400 font-medium">170 ads</span>
            </a>

            <a href="{{ route('public.search', ['category' => 8]) }}"
                class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition duration-300 text-center">
                <div
                    class="bg-red-50 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <span class="block font-bold text-gray-800 text-xs">Pets</span>
                <span class="text-[10px] text-gray-400 font-medium">150 ads</span>
            </a>

            <a href="{{ route('public.search', ['category' => 4]) }}"
                class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition duration-300 text-center">
                <div
                    class="bg-indigo-50 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <span class="block font-bold text-gray-800 text-xs">Services</span>
                <span class="text-[10px] text-gray-400 font-medium">170 ads</span>
            </a>

            <a href="{{ route('public.search', ['category' => 7]) }}"
                class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition duration-300 text-center">
                <div
                    class="bg-pink-50 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                </div>
                <span class="block font-bold text-gray-800 text-xs">Other</span>
                <span class="text-[10px] text-gray-400 font-medium">480 ads</span>
            </a>
        </div>
    </div>

    {{-- latest advertisement --}}
    <div class="max-w-7xl mx-auto py-12 px-4">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 flex">Latest Advertisements</h2>
            <a href="{{ route('public.search') }}" class="text-indigo-600 font-bold text-sm hover:underline">See all Advertisements →</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($ads as $ad)
                <a href="{{ route('public.ad.show', $ad->id) }}"
                    class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-all overflow-hidden border border-gray-100 group block">

                    <div x-data="{ active: 0, count: {{ $ad->images->count() }} }" class="relative h-48 bg-gray-200">
                        @foreach ($ad->images as $index => $image)
                            <img x-show="active === {{ $index }}"
                                src="{{ asset('storage/' . $image->file_path) }}" class="w-full h-full object-cover">
                        @endforeach

                        <template x-if="count > 1">
                            <div class="absolute bottom-2 inset-x-0 flex justify-center space-x-1">
                                <template x-for="i in count" :key="i">
                                    <div :class="active === i - 1 ? 'bg-indigo-600 w-4' : 'bg-white w-2'"
                                        class="h-1.5 rounded-full transition-all"></div>
                                </template>
                            </div>
                        </template>

                        <template x-if="count > 1">
                            <div
                                class="absolute inset-0 flex items-center justify-between px-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button @click.prevent.stop="active = (active - 1 + count) % count"
                                    class="bg-white/80 p-1 rounded-full shadow-sm text-gray-800 hover:bg-white z-10">❮</button>
                                <button @click.prevent.stop="active = (active + 1) % count"
                                    class="bg-white/80 p-1 rounded-full shadow-sm text-gray-800 hover:bg-white z-10">❯</button>
                            </div>
                        </template>
                    </div>

                    <div class="p-4">
                        <span
                            class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest">{{ $ad->category->name }}</span>
                        <h3 class="font-bold text-gray-900 mt-1 truncate">{{ $ad->title }}</h3>
                        <p class="text-sm text-gray-500 flex items-center mt-1">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                            </svg>
                            {{ $ad->location->name }}
                        </p>
                        <div class="mt-4 flex justify-between items-center border-t pt-3">
                            <span class="text-indigo-600 font-black">LKR {{ number_format($ad->price) }}</span>
                            <span
                                class="text-xs font-bold bg-gray-100 px-3 py-1.5 rounded-lg group-hover:bg-indigo-600 group-hover:text-white transition">View</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- logincard --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="relative overflow-hidden rounded-[2.5rem] bg-indigo-600 shadow-2xl mb-10">

        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-indigo-400/20 rounded-full blur-2xl"></div>


        <div class=" bg-gradient-to-r from-indigo-700 to-purple-800 relative px-8 py-12 md:px-20 md:py-16 flex flex-col lg:flex-row items-center justify-between gap-10">

            <div class="text-center lg:text-left">
                <h2 class="text-4xl md:text-5xl font-black text-white leading-[1.1] mb-6 tracking-tighter">
                    Sell Your Items <br>
                    <span class="text-white opacity-80">Faster Than Ever.</span>
                </h2>
                <p class="text-indigo-100/80 text-lg font-medium max-w-md mx-auto lg:mx-0">
                    Join Sri Lanka's fastest growing marketplace. Post your ad and get noticed by thousands of buyers instantly!
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 w-full lg:w-auto">
                <a href="{{ route('advertisements.create') }}"
                   class="group relative w-full sm:w-auto px-10 py-5 bg-white text-indigo-600 font-black rounded-3xl transition duration-300 transform hover:scale-105 shadow-xl flex items-center justify-center space-x-2">
                   <span class="text-lg">Post Your Ad Now</span>
                   <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                   </svg>
                </a>
            </div>

        </div>
    </div>
</div>
    </div>
    <x-footer />
</x-app-layout>
