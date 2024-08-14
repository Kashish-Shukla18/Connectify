<x-guest-layout>
    <div class="min-h-screen flex items-center justify-cente py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="text-center">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="mx-auto" style="height: 190px;">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Create an Account</h2>
                <p class="mt-2 text-sm text-gray-800">Please fill in the details to register</p>
            </div>
            <form class="mt-8  py-8 px-6 rounded-lg shadow-lg space-y-6" method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Batch -->
                <div>
                    <x-input-label for="batch" :value="__('Batch')" class="text-gray-700" />
                    <select id="batch" name="batch" class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" required>
                        @for ($year = 2002; $year <= 2024; $year++) <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                    </select>
                    <x-input-error class="mt-2 text-red-500" :messages="$errors->get('batch')" />
                </div>

                <!-- Branch -->
                <div>
                    <x-input-label for="branch" :value="__('Branch')" class="text-gray-700" />
                    <select id="branch" name="branch" class="mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" required>
                        @foreach (['CSE', 'ME', 'CE', 'IT', 'EE', 'ECE'] as $branch)
                        <option value="{{ $branch }}">{{ $branch }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2 text-red-500" :messages="$errors->get('branch')" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <x-input-label for="username" :value="__('Username')" class="text-gray-700" />
                    <x-text-input id="username" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="text" name="username" :value="old('username')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>



                <div class="flex items-center justify-between">
                    <a class="underline text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>