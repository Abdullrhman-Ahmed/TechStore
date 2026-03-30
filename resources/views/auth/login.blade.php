<x-guest-layout>
    <style>
        .auth-card {
            background: #1e293b !important; 
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            padding: 2rem;
        }

        .tech-input {
            background: #0f172a !important;
            border: 1px solid #334155 !important;
            color: white !important;
            border-radius: 10px !important;
            padding: 12px !important;
            transition: 0.3s;
        }

        .tech-input:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
        }

        .login-title {
            font-family: 'Orbitron', sans-serif;
            color: #3b82f6;
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 2rem;
            letter-spacing: 2px;
        }

        .btn-login {
            background: linear-gradient(45deg, #3b82f6, #2dd4bf) !important;
            border: none !important;
            width: 100%;
            padding: 12px !important;
            border-radius: 10px !important;
            font-weight: bold !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }
    </style>

    <div class="auth-card text-white">
        <h2 class="login-title">ADMIN ACCESS</h2>

        <x-auth-session-status class="mb-4 text-green-400" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-white  mb-2" />
                <x-text-input id="email" class="tech-input block mt-1 w-full" 
                              type="email" name="email" :value="old('email')" 
                              placeholder="admin@techstore.com"
                              required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <div class="flex justify-between items-center">
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    @if (Route::has('password.request'))
                        <a class="text-xs text-blue-400 hover:text-blue-300" href="{{ route('password.request') }}">
                            {{ __('Forgot?') }}
                        </a>
                    @endif
                </div>
                <x-text-input id="password" class="tech-input block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded bg-slate-900 border-gray-700 text-blue-600 focus:ring-blue-500 shadow-sm" name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
            </div>

            <div class="mt-6">
                <button type="submit" class="btn-login text-white">
                    {{ __('Log in') }}
                </button>
            </div>
            
            <div class="mt-4 text-center">
                <p class="text-xs text-gray-500">Authorized Personnel Only</p>
            </div>
        </form>
    </div>
</x-guest-layout>