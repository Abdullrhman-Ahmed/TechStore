<x-guest-layout>
    <style>
        .auth-card {
            background: #1e293b !important;
            border: 1px solid rgba(239, 68, 68, 0.3); /* Red alert border */
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, transparent, #ef4444, transparent);
            animation: shield-scan 2s linear infinite;
        }

        @keyframes shield-scan {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .confirm-title {
            font-family: 'Orbitron', sans-serif;
            color: #ef4444; 
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            letter-spacing: 2px;
        }

        .confirm-text {
            color: #94a3b8;
            font-size: 0.85rem;
            line-height: 1.6;
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
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
        }

        .btn-confirm {
            background: linear-gradient(45deg, #ef4444, #991b1b) !important;
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

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.4);
        }
    </style>

    <div class="auth-card">
        <div class="mb-3 text-center text-3xl">🛡️</div>
        <h2 class="confirm-title">SECURE AREA</h2>

        <div class="confirm-text">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-300 mb-1" />
                <x-text-input id="password" class="tech-input block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Enter admin password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <div class="mt-6">
                <button type="submit" class="btn-confirm">
                    {{ __('Confirm Identity') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>