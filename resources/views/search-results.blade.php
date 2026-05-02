<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">

            <div class="w-full md:w-1/4 space-y-6">
                <form action="{{ route('public.search') }}" method="GET"
                    class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100">
                    <h3 class="font-black text-slate-800 mb-6 text-xl text-center uppercase tracking-tighter">Filters
                    </h3>

                    <div class="mb-6">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-2">Search
                            Keywords</label>
                        <input type="text" name="query" value="{{ request('query') }}"
                            placeholder="What are you looking for?"
                            class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 text-sm border">
                    </div>

                    <div class="mb-6">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-2">Category</label>
                        <select name="category"
                            class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 text-sm border">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-2">Location</label>
                        <select name="location"
                            class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 text-sm border">
                            <option value="">All Locations</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}"
                                    {{ request('location') == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-8">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-2">Price
                            Range</label>
                        <div class="grid grid-cols-2 gap-3">
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min"
                                class="w-full border-slate-100 bg-slate-50 rounded-2xl text-sm font-bold focus:ring-4 focus:ring-indigo-50 p-4 border">
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max"
                                class="w-full border-slate-100 bg-slate-50 rounded-2xl text-sm font-bold focus:ring-4 focus:ring-indigo-50 p-4 border">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-black hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200 uppercase tracking-widest text-xs active:scale-95">
                        Apply Filters
                    </button>

                    <a href="{{ route('public.search') }}"
                        class="block text-center text-[10px] font-black text-slate-400 mt-6 hover:text-indigo-600 transition uppercase tracking-widest">
                        Clear All Filters
                    </a>
                </form>
            </div>

            <div class="w-full md:w-3/4">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                    <div>
                        <h2 class="text-2xl font-black text-slate-800 tracking-tighter">Showing Search Results</h2>
                        <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">{{ $ads->total() }}
                            ads found</p>
                    </div>

                    <form action="{{ route('public.search') }}" method="GET" id="sortForm">
                        @foreach (request()->except('sort') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <select name="sort" onchange="this.form.submit()"
                            class="border-slate-100 bg-white rounded-2xl text-xs font-black uppercase tracking-widest focus:ring-4 focus:ring-indigo-50 p-3 pr-10 shadow-sm border">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Date: Newest
                                First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Date: Oldest
                                First</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price:
                                Lowest to Highest</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price:
                                Highest to Lowest</option>
                        </select>
                    </form>
                </div>

                @if ($ads->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($ads as $ad)
                            <a href="{{ route('public.ad.show', $ad->id) }}"
                                class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/40 hover:shadow-2xl hover:shadow-indigo-100 transition-all overflow-hidden border border-slate-100 group block">
                                <div x-data="{ active: 0, count: {{ $ad->images->count() }} }" class="relative h-56 bg-slate-100">
                                    @if ($ad->images->count() > 0)
                                        @foreach ($ad->images as $index => $image)
                                            <img x-show="active === {{ $index }}"
                                                src="{{ asset('storage/' . $image->file_path) }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @endforeach
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-slate-300 font-black uppercase tracking-widest text-[10px]">
                                            No Image Available
                                        </div>
                                    @endif

                                    <template x-if="count > 1">
                                        <div
                                            class="absolute inset-0 flex items-center justify-between px-4 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button @click.prevent.stop="active = (active - 1 + count) % count"
                                                class="bg-white/90 backdrop-blur p-2 rounded-xl shadow-lg text-slate-800 z-10 hover:bg-indigo-600 hover:text-white transition">❮</button>
                                            <button @click.prevent.stop="active = (active + 1) % count"
                                                class="bg-white/90 backdrop-blur p-2 rounded-xl shadow-lg text-slate-800 z-10 hover:bg-indigo-600 hover:text-white transition">❯</button>
                                        </div>
                                    </template>
                                </div>

                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-2">
                                        <span
                                            class="text-[9px] font-black bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full uppercase tracking-widest">{{ $ad->category->name }}</span>
                                        <span
                                            class="text-[9px] font-black text-slate-400 uppercase tracking-widest">{{ $ad->location->name }}</span>
                                    </div>
                                    <h3
                                        class="font-black text-slate-800 text-lg leading-tight truncate group-hover:text-indigo-600 transition-colors">
                                        {{ $ad->title }}</h3>

                                    <span class="text-[8px] font-bold text-slate-400 uppercase tracking-tighter mt-0.5">
                                        {{ $ad->created_at->diffForHumans() }}</span>

                                    <div class="mt-1 flex justify-between items-center border-t border-slate-50 pt-4">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[8px] font-black text-slate-300 uppercase tracking-[0.2em]">Price</span>
                                            <span class="text-indigo-600 font-black text-lg tracking-tighter">LKR
                                                {{ number_format($ad->price) }}</span>
                                        </div>
                                        <span
                                            class="text-[10px] font-black bg-slate-800 text-white px-5 py-2.5 rounded-xl group-hover:bg-indigo-600 transition shadow-lg shadow-slate-100 uppercase tracking-widest">View</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div
                        class="bg-white p-20 rounded-[3rem] border border-dashed border-slate-200 text-center shadow-inner">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <p class="text-slate-400 font-black uppercase tracking-[0.2em]">No Results Found!</p>
                        <p class="text-xs text-slate-300 mt-2 font-bold">Try adjusting your filters to find what you're
                            looking for.</p>
                    </div>
                @endif

                <div class="mt-12">
                    {{ $ads->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer />
