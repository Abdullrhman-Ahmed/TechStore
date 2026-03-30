<x-guest-layout>
    <style>
        /* Auth Card Styling */
        .auth-card {
            background: #1e293b !important;
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .verify-title {
            font-family: 'Orbitron', sans-serif;
            color: #3b82f6;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            letter-spacing: 1.5px;
        }

        .verify-text {
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* Resend Button */
        .btn-resend {
            background: linear-gradient(45deg, #3b82f6, #2dd4bf) !important;
            border: none !important;
            padding: 12px 20px !important;
            border-radius: 10px !important;
            font-weight: bold !important;
            transition: 0.3s;
            color: white;
            text-transform: uppercase;
            font-size: 0.85rem;
            width: 100%;
        }

        .btn-resend:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .logout-link {
            color: #ef4444;
            text-decoration: none;
            font-size: 0.85rem;
            transition: 0.3s;
            opacity: 0.8;
            background: none;
            border: none;
            cursor: pointer;
        }

        .logout-link:hover {
            opacity: 1;
            text-decoration: underline;
        }

        .status-msg {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid rgba(16, 185, 129, 0.2);
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }
    </style>

    <div class="auth-card">
        <div class="mb-4 text-4xl">📩</div>
        <h2 class="verify-title">VERIFY IDENTITY</h2>

        <div class="verify-text">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="status-msg">
                <i class="bi bi-check-circle me-1"></i>
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-6 flex flex-col gap-4 items-center">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                @csrf
                <button type="submit" class="btn-resend">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-link">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>