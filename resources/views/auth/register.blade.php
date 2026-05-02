<x-guest-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>

        <div class="max-w-[480px] w-full bg-white rounded-[3rem] border border-slate-100 p-10 md:p-14 mb shadow-2xl">

            <div class="text-center mb-1">
                <a href="/" class="inline-flex items-center space-x-2 mb-6">
                    <div class="bg-indigo-600 p-2 rounded-xl shadow-lg shadow-indigo-500/20 text-white">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-black tracking-tighter text-[#0f172a] uppercase">Quick<span class="text-indigo-600">Sell</span></span>
                </a>
                <h1 class="text-3xl font-extrabold text-[#0f172a] tracking-tight mb-2">Create Account</h1>
                <p class="text-slate-500 font-medium">Join us to start posting your advertisements</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="space-y-2">
                    <label for="name" class="text-sm font-bold text-[#0f172a] ml-1">Full Name</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus
                            class="block w-full pl-12 pr-4 py-4 bg-[#f8fafc] border border-slate-200 rounded-2xl text-slate-900 text-sm focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200"
                            placeholder="John Doe">
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="space-y-2">
                    <label for="email" class="text-sm font-bold text-[#0f172a] ml-1">Email Address</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="email" :value="old('email')" required
                            class="block w-full pl-12 pr-4 py-4 bg-[#f8fafc] border border-slate-200 rounded-2xl text-slate-900 text-sm focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200"
                            placeholder="name@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-bold text-[#0f172a] ml-1">Password</label>
                        <input id="password" type="password" name="password" required
                            class="block w-full px-5 py-4 bg-[#f8fafc] border border-slate-200 rounded-2xl text-slate-900 text-sm focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200"
                            placeholder="••••••••">
                    </div>
                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-sm font-bold text-[#0f172a] ml-1">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="block w-full px-5 py-4 bg-[#f8fafc] border border-slate-200 rounded-2xl text-slate-900 text-sm focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200"
                            placeholder="••••••••">
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-100 flex items-center justify-center space-x-2 transition-all duration-200 active:scale-[0.98] mt-4">
                    <span>Create Account</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </button>
            </form>

            <div class="relative my-5">
                <div class="absolute inset-0 flex items-center">
                    <span class="w-full border-t border-slate-100"></span>
                </div>
                <div class="relative flex justify-center text-xs uppercase">
                    <span class="bg-white px-4 text-slate-400 font-bold tracking-[0.2em]">Or</span>
                </div>
            </div>

            <a href="/auth/google" class="w-full flex items-center justify-center space-x-3 py-4 border border-slate-200 rounded-2xl hover:bg-slate-50 hover:border-slate-300 transition-all duration-200 group">
                <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5 group-hover:scale-110 transition-transform" alt="Google">
                <span class="text-[#0f172a] font-bold text-sm">Sign up with Google</span>
            </a>

            <div class="mt-4 text-center">
                <p class="text-slate-500 text-sm font-medium">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-indigo-600 font-extrabold hover:underline ml-1">Log in here</a>
                </p>
            </div>
        </div>
</x-guest-layout>
<x-footer/>
