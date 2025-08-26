<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-600 to-pink-400">
        <div class="w-full max-w-sm bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6">
            <!-- Logo & Title -->
            <div class="flex flex-col items-center mb-4">
                <!-- Stylish Font Logo -->
                <span class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 font-mono tracking-wide mb-2 select-none">
                    CM
                </span>
                <h2 class="text-5xl font-bold text-indigo-700 text-white">Competition Manager</h2>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-indigo-700 dark:text-indigo-400" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-400 dark:focus:ring-indigo-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div class="mt-3">
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-indigo-700 dark:text-indigo-400" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-400 dark:focus:ring-indigo-600" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 focus:ring-indigo-400 dark:focus:ring-indigo-600" name="remember">
                        <span class="ms-2 text-xs text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-xs text-indigo-500 dark:text-indigo-400 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <x-primary-button class="w-full mt-6 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-md transition-all shadow">
                    {{ __('Log in') }}
                </x-primary-button>
            </form>

            <!-- Register Link -->
            <div class="mt-5 text-center">
                <span class="text-xs text-gray-500 dark:text-gray-400">{{ __("Don't have an account?") }}</span>
                <a href="{{ route('register') }}" class="text-xs text-indigo-600 dark:text-indigo-400 font-semibold hover:underline ml-1">
                    {{ __('Register') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
