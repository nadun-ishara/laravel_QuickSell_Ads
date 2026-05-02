<section class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
    <header class="bg-indigo-600 p-5 text-center">
        <h2 class="text-3xl font-black text-white tracking-tighter">Profile Information</h2>
        <p class="mt-1 text-indigo-100 text-[10px] font-bold uppercase tracking-widest">
            Update your account's profile information and email address.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="p-8 sm:p-12 space-y-8">
        @csrf
        @method('patch')

        <div class="space-y-6">
            <div>
                <x-input-label :value="__('Full Name')" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4" />
                <x-text-input id="name" name="name" type="text" class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 border" :value="old('name', $user->name)" required autofocus />
                <x-input-error class="mt-2 ml-4" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label :value="__('Email Address')" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-4" />
                <x-text-input id="email" name="email" type="email" class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 font-bold text-slate-700 transition-all p-4 border" :value="old('email', $user->email)" required />
                <x-input-error class="mt-2 ml-4" :messages="$errors->get('email')" />
            </div>
        </div>

        <div class="pt-6 flex items-center justify-end gap-4 border-t border-slate-50">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-black px-10 py-4 rounded-2xl shadow-xl shadow-indigo-200 transition-all active:scale-95 uppercase tracking-widest text-xs">
            Save Changes
            </button>
        </div>
    </form>
</section>
