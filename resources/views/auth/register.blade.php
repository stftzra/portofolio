<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-pink-600" />
            <x-text-input id="name" class="block mt-1 w-full border border-pink-300 text-gray-800 bg-pink-100 focus:ring-pink-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-pink-600" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-pink-600" />
            <x-text-input id="email" class="block mt-1 w-full border border-pink-300 text-gray-800 bg-pink-100 focus:ring-pink-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-pink-600" />

            <x-text-input id="password" class="block mt-1 w-full border border-pink-300 text-gray-800 bg-pink-100 focus:ring-pink-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-pink-600" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full border border-pink-300 text-gray-800 bg-pink-100 focus:ring-pink-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-pink-600" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-pink-600 hover:text-pink-700" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-pink-500 hover:bg-pink-600 text-white focus:ring-pink-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
