<section class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
    <header class="bg-rose-600 p-5 text-center">
        <h2 class="text-3xl font-black text-white tracking-tighter">Delete Account</h2>
        <p class="mt-1 text-rose-100 text-[10px] font-bold uppercase tracking-widest">
            Once your account is deleted, all of its resources and data will be permanently deleted.
        </p>
    </header>

    <div class="p-8 sm:p-12 text-center">
        <p class="text-sm font-bold text-slate-500 mb-8 px-6">
            Before deleting your account, please download any data or information that you wish to retain.
        </p>

        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="bg-rose-600 hover:bg-rose-700 text-white font-black px-10 py-4 rounded-2xl shadow-xl shadow-rose-200 transition-all active:scale-95 uppercase tracking-widest text-xs">
            Delete My Account
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy" class="p-8">
            @csrf
            @method('delete')

            <h2 class="text-xl font-black text-slate-800 uppercase tracking-tighter mb-4">
                Are you sure you want to delete?
            </h2>

            <p class="text-sm font-bold text-slate-500 mb-6">
                Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <div class="mb-6">
                <x-text-input id="password" name="password" type="password" class="w-full border-slate-100 bg-slate-50 rounded-2xl focus:ring-4 focus:ring-rose-50 focus:border-rose-500 font-bold text-slate-700 transition-all p-4 border" placeholder="Password" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 ml-4" />
            </div>

            <div class="flex justify-end gap-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl font-bold uppercase text-[10px] tracking-widest">
                    Cancel
                </x-secondary-button>

                <x-danger-button class="rounded-xl font-black uppercase text-[10px] tracking-widest bg-rose-600">
                    Delete Account
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
