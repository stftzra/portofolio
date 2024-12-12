<x-guest-layout>
    <style>
        body {
            background-color: #f7f3f7;
            color: #333;
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
            margin: 0;
        }

        /* General Form Styling */
        form {
            background-color: #fff0f5; /* Pinkish white */
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0px 8px 30px rgba(255, 20, 147, 0.3); /* Pink shadow */
            max-width: 400px;
            margin: auto;
            margin-top: 15vh;
            position: relative;
            overflow: visible;
            opacity: 0;
            transform: translateY(30px);
            animation: formAppear 0.8s ease-out forwards;
        }

        @keyframes formAppear {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Labels and Text */
        .text-gray-600, .text-gray-400, label {
            color: #ff69b4; /* Hot pink */
            font-weight: bold;
            transition: color 0.3s ease;
        }

        /* Input Fields */
        .block.mt-1.w-full {
            background-color: #ffe4e1; /* Light pink */
            border: 1px solid #ffc0cb; /* Pink border */
            color: #333;
            border-radius: 6px;
            padding: 0.75rem;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .block.mt-1.w-full:focus {
            border-color: #ff1493; /* Deep pink */
            box-shadow: 0 0 0 3px rgba(255, 20, 147, 0.3);
            transform: scale(1.05);
            background-color: #fffafc; /* Slightly brighter */
        }

        /* Checkboxes */
        input[type="checkbox"] {
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        input[type="checkbox"]:checked {
            transform: scale(1.2);
            animation: checkboxAnim 0.3s ease;
        }

        @keyframes checkboxAnim {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.2);
            }
        }

        /* Remember Me Checkbox Label */
        .ml-2 {
            color: #ff69b4;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        /* Links */
        a {
            color: #ff69b4; /* Hot pink */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            color: #ff1493; /* Deep pink */
            text-decoration: underline;
            transform: scale(1.05);
        }

        /* Button */
        .primary-button {
            background-color: #ff69b4; /* Hot pink */
            color: #fff;
            padding: 0.75rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
            margin-top: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .primary-button:hover {
            background-color: #ff1493; /* Deep pink */
            transform: translateY(-2px) scale(1.05);
        }

        /* Forgot Password Link */
        .forgot-password {
            text-align: center;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            form {
                padding: 1.5rem;
            }

            .primary-button {
                padding: 0.5rem;
            }
        }

    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-pink-300 text-pink-600 shadow-sm focus:ring-pink-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-center mt-4">
            <button type="submit" class="primary-button">
                {{ __('Log in') }}
            </button>
        </div>

        <!-- Forgot Password Link -->
        <div class="forgot-password">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-pink-600 hover:text-pink-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
