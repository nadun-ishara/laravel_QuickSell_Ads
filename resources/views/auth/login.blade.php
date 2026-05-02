<x-guest-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>

        <div class="max-w-[480px] w-full bg-white rounded-[3rem] border border-slate-100 p-10 md:p-14 shadow-2xl">

            {{-- logo --}}
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center space-x-2 mb-6">
                    <div class="bg-indigo-600 p-2 rounded-xl shadow-lg shadow-indigo-500/20 text-white">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-2xl font-black tracking-tighter text-[#0f172a] uppercase">Quick<span class="text-indigo-600">Sell</span></span>
                </a>
                <h1 class="text-3xl font-extrabold text-[#0f172a] tracking-tight mb-2">Welcome Back</h1>
                <p class="text-slate-500 font-medium">Enter your credentials to access your account</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="text-sm font-bold text-[#0f172a] ml-1">Email Address</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="block w-full pl-12 pr-4 py-4 bg-[#f8fafc] border border-slate-200 rounded-2xl text-slate-900 text-sm focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200"
                            placeholder="name@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label for="password" class="text-sm font-bold text-[#0f172a]">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs font-bold text-indigo-600 hover:text-indigo-700" href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required
                            class="block w-full pl-12 pr-4 py-4 bg-[#f8fafc] border border-slate-200 rounded-2xl text-slate-900 text-sm focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white transition-all duration-200"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-100 flex items-center justify-center space-x-2 transition-all duration-200 active:scale-[0.98]">
                    <span>Sign In</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
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
                <span class="text-[#0f172a] font-bold text-sm">Sign in with Google</span>
            </a>

            <div class="mt-4 text-center">
                <p class="text-slate-500 text-sm font-medium">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-indigo-600 font-extrabold hover:underline ml-1">Sign up now</a>
                </p>
            </div>
        </div>
</x-guest-layout>
<x-footer/>
