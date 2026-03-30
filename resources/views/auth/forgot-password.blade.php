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

        .forgot-title {
            font-family: 'Orbitron', sans-serif;
            color: #3b82f6;
            text-align: center;
            font-size: 1.3rem;
            margin-bottom: 1rem;
            letter-spacing: 1.5px;
        }

        .forgot-text {
            color: #94a3b8;
            font-size: 0.9rem;
            line-height: 1.5;
            text-align: center;
            margin-bottom: 1.5rem;
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

        .btn-submit {
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

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .back-link {
            display: block;
            margin-top: 1.5rem;
            text-align: center;
            color: #64748b;
            font-size: 0.85rem;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-link:hover {
            color: #3b82f6;
        }
    </style>

    <div class="auth-card">
        <div class="mb-3 text-center text-3xl">🔒</div>
        <h2 class="forgot-title">PASSWORD RECOVERY</h2>

        <div class="forgot-text">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <x-auth-session-status class="mb-4 text-green-400 text-sm font-medium" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" class="text-gray-300 mb-1" />
                <x-text-input id="email" class="tech-input block mt-1 w-full" 
                              type="email" name="email" :value="old('email')" 
                              placeholder="admin@techstore.com"
                              required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <div class="mt-6">
                <button type="submit" class="btn-submit">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>

            <a href="{{ route('login') }}" class="back-link">
                <i class="bi bi-arrow-left"></i> Back to Login
            </a>
        </form>
    </div>
</x-guest-layout>