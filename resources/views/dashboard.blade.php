<x-app-layout>
    <div class="min-h-screen bg-[#f8fafc] py-12 px-4 sm:px-6 lg:px-8 mb-14">
        <div class="max-w-6xl mx-auto">

            <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                <div>
                    <h2 class="text-3xl font-black text-[#0f172a] tracking-tighter">My Advertisements</h2>
                    <p class="text-slate-500 font-medium">Manage your listed items</p>
                </div>
                <a href="{{ route('advertisements.create') }}"
                   class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-indigo-100 hover:bg-indigo-700 transform hover:-translate-y-1 transition-all active:scale-[0.98]">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Post New Ad
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl font-bold flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Image</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Title</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Price</th>
                                <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($ads as $ad)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="px-8 py-5">
                                        <div class="h-16 w-16 rounded-2xl overflow-hidden shadow-sm border border-slate-100 bg-white">
                                            @if ($ad->images->count() > 0)
                                                <img src="{{ asset('storage/' . $ad->images->first()->file_path) }}"
                                                     class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <div class="h-full w-full flex items-center justify-center bg-slate-50">
                                                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-6 py-5">
                                        <a href="{{ route('advertisements.show', $ad->id) }}" class="block">
                                            <span class="text-sm font-bold text-[#0f172a] hover:text-indigo-600 transition-colors line-clamp-1">
                                                {{ $ad->title }}
                                            </span>
                                            <span class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">ID: #{{ str_pad($ad->id, 5, '0', STR_PAD_LEFT) }}</span>
                                        </a>
                                    </td>

                                    <td class="px-6 py-5">
                                        <div class="text-sm font-black text-indigo-600">
                                            LKR {{ number_format($ad->price) }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-5">
                                        @if ($ad->status == 'pending')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-amber-50 text-amber-600 border border-amber-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-2 animate-pulse"></span> Pending
                                            </span>
                                        @elseif($ad->status == 'rejected')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-rose-50 text-rose-600 border border-rose-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-2"></span> Rejected
                                            </span>
                                        @elseif($ad->status == 'active')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 border border-emerald-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2"></span> Live
                                            </span>
                                        @endif
                                    </td>

                                    {{-- action --}}
                                    <td class="px-8 py-5 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('advertisements.edit', $ad->id) }}"
                                               class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all">
                                               {{-- edit icon --}}
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>

                                            <form action="{{ route('advertisements.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ad?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all">
                                                    {{-- delete icon --}}
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center">
                                        <div class="max-w-xs mx-auto">
                                            <div class="bg-slate-50 w-16 h-16 rounded-3xl flex items-center justify-center mx-auto mb-4 text-slate-300">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            </div>
                                            <p class="text-slate-500 font-bold mb-4 text-sm">No advertisements found yet.</p>
                                            <a href="{{ route('advertisements.create') }}" class="text-indigo-600 font-black text-xs uppercase tracking-widest hover:underline">Start Selling Now →</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer/>
