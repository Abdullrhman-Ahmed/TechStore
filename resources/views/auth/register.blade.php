<x-guest-layout>
    <style>
        .auth-card {
            background: #1e293b !important;
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
        }

        .tech-input {
            background: #0f172a !important;
            border: 1px solid #334155 !important;
            color: white !important;
            border-radius: 10px !important;
            padding: 10px 15px !important;
            transition: 0.3s;
        }

        .tech-input:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        }

        .register-title {
            font-family: 'Orbitron', sans-serif;
            color: #3b82f6;
            text-align: center;
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            letter-spacing: 2px;
        }

        .btn-register {
            background: linear-gradient(45deg, #3b82f6, #2dd4bf) !important;
            border: none !important;
            width: 100%;
            padding: 12px !important;
            border-radius: 10px !important;
            font-weight: bold !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            color: white;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .login-link {
            color: #94a3b8;
            font-size: 0.85rem;
            text-decoration: none;
            transition: 0.3s;
        }

        .login-link:hover {
            color: #3b82f6;
        }
    </style>

    <div class="auth-card">
        <h2 class="register-title">CREATE ACCOUNT</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <x-input-label for="name" :value="__('Full Name')" class="text-gray-300 mb-1" />
                <x-text-input id="name" class="tech-input block mt-1 w-full" 
                              type="text" name="name" :value="old('name')" 
                              placeholder="Enter your name"
                              required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-3">
                <x-input-label for="email" :value="__('Email Address')" class="text-gray-300 mb-1" />
                <x-text-input id="email" class="tech-input block mt-1 w-full" 
                              type="email" name="email" :value="old('email')" 
                              placeholder="name@example.com"
                              required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-3">
                <x-input-label for="password" :value="__('Password')" class="text-gray-300 mb-1" />
                <x-text-input id="password" class="tech-input block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300 mb-1" />
                <x-text-input id="password_confirmation" class="tech-input block mt-1 w-full"
                                type="password"
                                name="password_confirmation" 
                                placeholder="••••••••"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-6">
                <button type="submit" class="btn-register">
                    {{ __('Sign Up') }}
                </button>
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="login-link" href="{{ route('login') }}">
                    {{ __('Already have an account? Log in') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>