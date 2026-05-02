<section class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
    <header class="bg-indigo-600 p-5 text-center">
        <h2 class="text-3xl font-black text-white tracking-tighter">Update Password</h2>
        <p class="mt-1 text-indigo-100 text-[10px] font-bold uppercase tracking-widest">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="p-8 sm:p-12 space-y-8">
        @csrf
        @method('put')

        <div class="space-y-6">
            <div>
                <x-input-label for="current_password" :value="__('Current Password')" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4" />
                <x-text-input id="current_password" name="current_password" type="password" class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 border" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 ml-4" />
            </div>

            <div>
                <x-input-label for="password" :value="__('New Password')" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4" />
                <x-text-input id="password" name="password" type="password" class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 border" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 ml-4" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 border" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 ml-4" />
            </div>
        </div>

        <div class="pt-6 flex items-center justify-end gap-4 border-t border-slate-50">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-black px-10 py-4 rounded-2xl shadow-xl shadow-indigo-200 transition-all active:scale-95 uppercase tracking-widest text-xs">
                Save Password
            </button>
        </div>
    </form>
</section>
