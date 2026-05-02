<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tighter">
                    Ad Moderation
                </h2>
                <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">
                    Control Center • {{ count($pendingAds) }} ads awaiting review
                </p>
            </div>

            <div class="flex gap-4">
                <div class="bg-indigo-50 px-4 py-2 rounded-2xl border border-indigo-100">
                    <span class="block text-[10px] font-black text-indigo-400 uppercase tracking-widest">Pending</span>
                    <span class="text-lg font-black text-indigo-600 leading-none">{{ count($pendingAds) }}</span>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50/50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-[2rem] font-bold text-sm shadow-sm flex items-center gap-3">
                    <span class="bg-emerald-500 text-white p-2 rounded-full text-[10px]">✓</span>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-100 text-red-600 px-6 py-4 rounded-[2rem] font-bold text-sm shadow-sm flex items-center gap-3">
                    <span class="bg-red-500 text-white p-2 rounded-full text-[10px]">✓</span>
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-50">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Advertisement Details</th>
                                <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Seller Information</th>
                                <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Price Tag</th>
                                <th class="px-8 py-6 text-right text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Decisions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($pendingAds as $ad)
                            <tr class="hover:bg-slate-50/50 transition-colors group">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-slate-100 rounded-2xl overflow-hidden flex-shrink-0 border border-slate-200">
                                            @if($ad->images->count() > 0)
                                                <img src="{{ asset('storage/' . $ad->images->first()->file_path) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-[8px] font-black text-slate-300">NO IMG</div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-sm font-black text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $ad->title }}</div>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="text-[9px] font-black bg-indigo-50 text-indigo-500 px-2 py-0.5 rounded-md uppercase tracking-widest">{{ $ad->category->name }}</span>
                                                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter">{{ $ad->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold text-slate-600">{{ $ad->user->name }}</span>
                                        <span class="text-[10px] font-medium text-slate-400">{{ $ad->user->email }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm font-black text-slate-800 tracking-tighter">
                                        LKR {{ number_format($ad->price) }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-right">
                                    <div class="flex justify-end gap-3">
                                        <form action="{{ route('admin.ads.approve', $ad->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-emerald-100 transition-all hover:-translate-y-0.5 active:scale-95">
                                                Approve
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.ads.reject', $ad->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-white border border-slate-200 text-slate-400 hover:text-red-500 hover:border-red-100 hover:bg-red-50 px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all active:scale-95">
                                                Reject
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-8 py-24 text-center">
                                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <p class="text-slate-400 font-black uppercase tracking-widest text-xs">All Clear!</p>
                                    <p class="text-[10px] text-slate-300 font-bold mt-1 uppercase">No advertisements pending for review.</p>
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
