<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter leading-none">
                    Location Management
                </h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest leading-none">
                    Manage cities for QuickSell ads
                </p>
            </div>

            <a href="{{ route('locations.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-indigo-100 hover:-translate-y-0.5 transition-all flex items-center gap-2">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                Add New Location
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50/50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="p-8">
                    <div class="space-y-4">
                        @forelse ($locations as $loc)
                        <div class="flex justify-between items-center p-5 bg-slate-50/50 rounded-3xl border border-slate-100 hover:border-indigo-100 transition-all group">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm text-indigo-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-black text-slate-800 tracking-tight group-hover:text-indigo-600 transition-colors">
                                        {{ $loc->name }}
                                    </h4>
                                    @if($loc->parent)
                                        <span class="text-[9px] font-bold text-indigo-400 uppercase tracking-widest">Sub of: {{ $loc->parent->name }}</span>
                                    @else
                                        <span class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest leading-none px-2 py-0.5 bg-emerald-50 rounded-md">Main city</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        @empty
                        <div class="py-20 text-center">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <p class="text-slate-400 font-black uppercase tracking-widest text-xs">No Locations Found</p>
                            <p class="text-[10px] text-slate-300 font-bold mt-1 uppercase">Start by adding a new city.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer/>
