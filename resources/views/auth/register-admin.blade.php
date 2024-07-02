<x-guest-layout>
    <form method="POST" action="{{ route('register-admin.store') }}">
        @csrf
            <div class="flex lg:justify-center lg:col-start-2">
                <img src="https://www.pngmart.com/files/7/Helpdesk-PNG-Clipart.png" alt="Logo" style="width: 300px; height: auto;" class="img-fluid">
            </div>
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="flex lg:justify-center lg:col-start-2">
                    <h1 class="text-xl font-semibold" style="color: rgb(100, 100, 100); font-size: 25px;">HELPDESK TROUBLESHOOTER REGISTER</h1>
                </div>
                <div class="flex lg:justify-center lg:col-start-2">
                    <h4 class="text" style="color: rgb(100, 100, 100); font-size: 15px;">Silakan register terlebih dahulu untuk mengakses Aplikasi Helpdesk </h4>
                </div>
            </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" class="custom-font-color" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="custom-font-color" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="custom-font-color" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="custom-font-color" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" style="color: red;">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<footer class="footer-blue mt-10 p-10 text-center">
    <p> Kantor Walikota Administrasi Jakarta Utara - Register &copy; 2024</p>
</footer>

<style>
    .footer-blue {
    background-color: blue;
    color: white; /* Agar teks tetap terlihat jelas di background biru */
}
</style>
