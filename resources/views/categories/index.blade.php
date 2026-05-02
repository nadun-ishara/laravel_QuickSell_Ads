<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter leading-none">
                    Category Management
                </h2>
                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest leading-none">
                    Manage categories for QuickSell ads
                </p>
            </div>

            <a href="{{ route('categories.create') }}"
                class="bg-indigo-600 text-white px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-indigo-100 hover:-translate-y-0.5 transition-all">
                + Add New Category
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50/50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="p-8">
                    <div class="space-y-4">
                        @foreach ($categories as $cat)
                            <div
                                class="flex justify-between items-center p-5 bg-slate-50/50 rounded-3xl border border-slate-100 hover:border-indigo-100 transition-all group">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-indigo-500 font-black">
                                        {{ substr($cat->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h4
                                            class="font-black text-slate-800 tracking-tight group-hover:text-indigo-600 transition-colors">
                                            {{ $cat->name }}
                                        </h4>
                                        @if ($cat->parent)
                                            <span
                                                class="text-[9px] font-bold text-indigo-400 uppercase tracking-widest">Sub
                                                of: {{ $cat->parent->name }}</span>
                                        @else
                                            <span
                                                class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest">Main
                                                Category</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer />
