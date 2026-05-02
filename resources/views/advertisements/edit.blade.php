<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">

                <div class="bg-indigo-600 p-8 text-center">
                    <h2 class="text-3xl font-black text-white tracking-tighter uppercase">Edit Your Advertisement</h2>
                    <p class="text-indigo-100 text-xs font-bold mt-2 uppercase tracking-widest">Update your details and
                        manage photos</p>
                </div>

                <form action="{{ route('advertisements.update', $ad->id) }}" method="POST" enctype="multipart/form-data"
                    class="p-8 sm:p-12 space-y-8">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4">Ad
                                Title</label>
                            <input type="text" name="title" value="{{ $ad->title }}"
                                class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4">
                        </div>
                        <div>
                            <label
                                class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4">Price
                                (LKR)</label>
                            <input type="number" name="price" value="{{ $ad->price }}"
                                class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4">
                        </div>
                    </div>

                    <div>
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4">Description</label>
                        <textarea name="description" rows="5"
                            class="w-full border-slate-100 bg-slate-50 rounded-[2rem] focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-6">{{ $ad->description }}</textarea>
                    </div>

                    <div class="pt-8 flex flex-col sm:flex-row gap-4 items-center justify-between">
                        <a href="{{ url()->previous() }}"
                            class="text-xs font-black text-slate-400 hover:text-slate-600 uppercase tracking-widest transition-colors">Cancel
                            Changes</a>

                        <button type="submit"
                            class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-black px-12 py-4 rounded-2xl shadow-xl shadow-indigo-200 transition-all active:scale-95 uppercase tracking-widest text-sm">
                            Update Advertisement
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<x-footer />
