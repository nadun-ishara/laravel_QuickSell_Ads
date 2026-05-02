<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter leading-none">
                    Add Location
                </h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest leading-none">
                    Define operational cities for QuickSell ads
                </p>
            </div>
            <a href="{{ route('locations.index') }}" class="text-[10px] font-black text-slate-400 hover:text-indigo-600 uppercase tracking-widest transition-colors">
                ← View All Locations
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50/50">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden transition-all">
                <div class="p-10">
                    <form action="{{ route('locations.store') }}" method="post" class="space-y-8">
                        @csrf

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">City Name</label>
                            <input type="text" name="name" placeholder="e.g. Colombo, Kandy, Matara"
                                class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 placeholder:text-slate-300 focus:ring-2 focus:ring-indigo-100 transition-all" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Parent Location (Optional)</label>
                            <div class="relative">
                                <select name="parent_id"
                                    class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 appearance-none focus:ring-2 focus:ring-indigo-100 transition-all">
                                    <option value="">Main City (No Parent)</option>
                                    @foreach ($locations as $loc)
                                        <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="text-[9px] text-slate-300 font-medium ml-2 uppercase tracking-tighter italic">Select a parent if this is a sub-city or city.</p>
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black uppercase tracking-[0.2em] text-[11px] py-5 rounded-2xl shadow-lg shadow-indigo-100 transition-all hover:-translate-y-1 active:scale-[0.98]">
                                Save Location
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer/>
