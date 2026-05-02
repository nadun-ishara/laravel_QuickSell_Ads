<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .swiper {
            width: 100%;
            height: 450px;
            background: #ffffff;
            border-radius: 2rem;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 2rem;
        }

        /* Navigation Buttons Styling */
        .swiper-button-next, .swiper-button-prev {
            background: rgba(255, 255, 255, 0.9);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            color: #4f46e5;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 18px;
            font-weight: bold;
        }

        .custom-shadow {
            box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="py-10 bg-[#f9fafb] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ url()->previous() }}" class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-indigo-600 transition-colors uppercase tracking-widest">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Ads
                </a>
            </div>

            <div class="bg-white rounded-[2.5rem] custom-shadow border border-slate-100 overflow-hidden">

                <div class="p-3">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($ad->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $ad->title }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="p-8 sm:p-12">

                    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 border-b border-slate-50 pb-8">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <h1 class="text-3xl font-black text-slate-800 tracking-tighter">{{ $ad->title }}</h1>
                                <span class="bg-indigo-50 text-indigo-600 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest">{{ $ad->status }}</span>
                            </div>
                            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Published on {{ $ad->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="bg-indigo-600 px-8 py-4 rounded-3xl shadow-lg shadow-indigo-200">
                            <span class="text-white text-xl font-black tracking-tight">LKR {{ number_format($ad->price) }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 py-10">
                        <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100">
                            <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Category</span>
                            <span class="text-slate-700 font-bold ">{{ $ad->category->name }}</span>
                        </div>
                        <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100">
                            <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Location</span>
                            <span class="text-slate-700 font-bold ">{{ $ad->location->name }}</span>
                        </div>
                        <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100">
                            <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Negotiable</span>
                            <span class="text-slate-700 font-bold ">{{ $ad->is_negotiable ? 'Yes' : 'No' }}</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="flex items-center text-xs font-black text-slate-400 uppercase tracking-[0.2em]">
                            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                            Product Description
                        </h3>
                        <div class="bg-slate-50/50 p-8 rounded-[2rem] border border-dashed border-slate-200 text-slate-600 leading-relaxed  text-sm whitespace-pre-line">
                            {{ $ad->description }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</x-app-layout>
<x-footer/>
