<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div style="height: 90vh;" class="flex items-center justify-center bg-white/30sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="text-center">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="mx-auto" style="height: 190px;">
                <h2 class="text-3xl font-extrabold text-gray-900">Welcome Back</h2>
                <p class="mt-2 text-sm text-gray-900">Please login to your account</p>
            </div>
            <form class="mt-8 bg-white/30 py-8 px-6 rounded-2xl shadow-lg space-y-4" method="POST" action="{{ route('login') }}">

                @csrf
                <div class="space-y-4">
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                        <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                        <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />

                        <!-- Custom Error Message for Wrong Password -->
                        @if($errors->has('email') && !$errors->has('password'))
                            <span class="text-red-500 text-sm mt-2">{{ __('You entered the wrong password.') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center text-sm text-gray-900">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
            <div class="text-center mt-4">
                <p class="text-gray-900">Don't have an account? <a href="{{ route('register') }}" class="text-white hover:underline mr-6">{{ __('Sign up') }}</a></p>
            </div>
        </div>
    </div>
</x-guest-layout>
un