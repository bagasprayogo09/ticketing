<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="flex lg:justify-center lg:col-start-2">
                <img src="https://www.pngmart.com/files/7/Helpdesk-PNG-Clipart.png" alt="Logo" style="width: 350px; height: auto;" class="img-fluid">
             </div>
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="flex lg:justify-center lg:col-start-2">
                    <h1 class="text-xl font-semibold" style="color: gray; font-size: 22px;">HELPDESK TROUBLESHOOTER LOGIN CLIENT</h1>
                </div>
                <div class="flex lg:justify-center lg:col-start-2">
                    <h4 class="text" style="color: gray; font-size: 15px;">Silakan login terlebih dahulu untuk mengakses Aplikasi Helpdesk </h4>
                </div>
            </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" class="custom-font-color" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="custom-font-color" :value="__('Password')" />

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

  <!-- Forgot Password and Register Links -->
  <div class="flex items-center justify-between mt-4">
    <div class="flex items-center">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
    </div>

    <div class="flex items-center">
        @if (Route::has('register'))
           <a class="custom-font-color" >Belum punya akun?</a>
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 me-3" href="{{ route('register') }}">
                {{ __('daftar di sini') }}
            </a>
        @endif

            <x-primary-button class="ms-3">
                {{ __('LOGIN') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<footer class="mt-10 p-10  text-black text-center">
    <p> Kantor Walikota Administrasi Jakarta Utara - Login &copy; 2024</p>
</footer>


