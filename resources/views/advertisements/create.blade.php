<x-app-layout>
    <div class="min-h-screen bg-[#f8fafc] py-12 px-4 sm:px-6 lg:px-8"
         x-data="{
            previewImages: [],
            handleFiles(event) {
                const files = Array.from(event.target.files);
                if (this.previewImages.length + files.length > 5) {
                    alert('You can only upload a maximum of 5 images.');
                    return;
                }
                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.previewImages.push(e.target.result);
                    };
                    reader.readAsDataURL(file);
                });
            },
            removeImage(index) {
                this.previewImages.splice(index, 1);
            }
         }">

        <div class="max-w-3xl mx-auto bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-slate-100">

            <div class="bg-indigo-600 px-8 py-7 text-center">
                <h2 class="text-3xl font-black text-white uppercase tracking-tighter mb-2">Post Your Advertisement</h2>
                <p class="text-indigo-100 font-medium">Fill in the details below to reach thousands of buyers.</p>
            </div>

            <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data" class="p-8 md:p-10 space-y-7">
                @csrf

                <div class="space-y-2">
                    <label class="text-sm font-bold text-[#0f172a] ml-1">Ad Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           placeholder="Ex: Toyota Corolla 2015 for sale"
                           class="w-full px-6 py-4 bg-[#f8fafc] border @error('title')  @else border-slate-200 @enderror rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition-all outline-none text-slate-700">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1 font-bold italic ml-2">* {{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-[#0f172a] ml-1">Category</label>
                        <select name="category_id" class="w-full px-6 py-4 bg-[#f8fafc] border @error('category_id')  @else border-slate-200 @enderror rounded-2xl focus:ring-2 focus:ring-indigo-600 outline-none text-slate-600 appearance-none">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1 font-bold italic ml-2">* {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-[#0f172a] ml-1">Location</label>
                        <select name="location_id" class="w-full px-6 py-4 bg-[#f8fafc] border @error('location_id')  @else border-slate-200 @enderror rounded-2xl focus:ring-2 focus:ring-indigo-600 outline-none text-slate-600 appearance-none">
                            <option value="">Select Location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('location_id')
                            <p class="text-red-500 text-xs mt-1 font-bold italic ml-2">* {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-[#0f172a] ml-1">Price (LKR)</label>
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <div class="relative flex-1">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 font-bold">Rs.</span>
                            <input type="number" name="price" value="{{ old('price') }}" step="0.01" placeholder="0.00"
                                   class="w-full pl-14 pr-6 py-4 bg-[#f8fafc] border @error('price')  @else border-slate-200 @enderror rounded-2xl focus:ring-2 focus:ring-indigo-600 outline-none transition-all">
                        </div>
                        <label class="flex items-center space-x-3 cursor-pointer group p-2">
                            <input type="checkbox" name="is_negotiable" value="1" {{ old('is_negotiable') ? 'checked' : '' }}
                                   class="w-5 h-5 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 transition-all">
                            <span class="text-sm font-bold text-slate-600 group-hover:text-indigo-600">Negotiable</span>
                        </label>
                    </div>
                    @error('price')
                        <p class="text-red-500 text-xs mt-1 font-bold italic ml-2">* {{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-[#0f172a] ml-1">Description</label>
                    <textarea name="description" rows="5" placeholder="Describe your item in detail..."
                              class="w-full px-6 py-4 bg-[#f8fafc] border @error('description')  @else border-slate-200 @enderror rounded-2xl focus:ring-2 focus:ring-indigo-600 outline-none transition-all resize-none">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1 font-bold italic ml-2">* {{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-4">
                    <label class="text-sm font-black text-[#0f172a] ml-1 uppercase tracking-tighter">Upload Images</label>

                    <div class="grid grid-cols-1 md:grid-cols-8 gap-4" x-show="previewImages.length > 0">
                        <template x-for="(img, index) in previewImages" :key="index">
                            <div class="relative aspect-square rounded-2xl overflow-hidden border border-slate-200 shadow-sm group">
                                <img :src="img" class="w-full h-full object-cover">

                                <button type="button" @click="removeImage(index)" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>

                            </div>
                        </template>
                    </div>

                    <div class="relative border-2 border-dashed @error('images') bg-red-50 @else border-slate-200 @enderror rounded-[2rem] p-8 text-center hover:bg-slate-50 transition-all group">
                        <div class="bg-white w-16 h-16 rounded-2xl shadow-sm flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="file" name="images[]" multiple accept="image/*"
                               @change="handleFiles($event)"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <p class="text-sm font-bold text-[#0f172a]" x-text="previewImages.length > 0 ? previewImages.length + ' images selected' : 'Click to select images'"></p>
                        <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-widest">* Max 5 images allowed</p>
                    </div>

                    @error('images')
                        <p class="text-red-600 text-xs mt-2 font-bold italic ml-2">* {{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="text-red-600 text-xs mt-1 font-bold italic ml-2">* One or more images are invalid or too large.</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 text-white py-5 rounded-2xl font-black text-lg uppercase tracking-widest shadow-xl shadow-indigo-100 hover:bg-indigo-700 transform hover:-translate-y-1 transition-all active:scale-[0.98]">
                    Post Advertisement
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
<x-footer/>
