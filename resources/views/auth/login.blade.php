<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — SIAP.COM</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.9/cdn.min.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; margin: 0; padding: 0; }

         :root {

        --navy: #1e293b;

        }
        body {
            min-height: 100vh;
            background: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background blobs */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            animation: float 8s ease-in-out infinite;
        }
      
        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }

    

        /* Card */
        .login-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            margin: 1rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            padding: 2.5rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
        }

        /* Logo / Header */
        .logo-wrap {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
        }
        .logo-icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }
        .logo-icon svg { width: 22px; height: 22px; color: white; }
        .logo-text { font-size: 1.4rem; font-weight: 700; color: white; letter-spacing: -0.5px; }
        .logo-text span { color: #6366f1; }

        .login-subtitle {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.4);
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        /* Badge */
        .admin-badge {
            display: inline-flex; align-items: center; gap: 0.4rem;
            background: rgba(99, 102, 241, 0.15);
            border: 1px solid rgba(99, 102, 241, 0.3);
            color: #a5b4fc;
            font-size: 0.72rem; font-weight: 600;
            padding: 0.3rem 0.75rem;
            border-radius: 9999px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }
        .admin-badge::before { content: '';  background: #6366f1;  animation: pulse-dot 2s infinite; }
        @keyframes pulse-dot { 0%, 100% { opacity: 1; } 50% { opacity: 0.4; } }

        /* Form elements */
        .form-group { margin-bottom: 1.25rem; }
        .form-label {
            display: block;
            font-size: 0.8rem; font-weight: 500;
            color: rgba(255,255,255,0.6);
            margin-bottom: 0.5rem;
            letter-spacing: 0.02em;
        }
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute; left: 0.875rem; top: 50%; transform: translateY(-50%);
            color: rgba(255,255,255,0.3);
            pointer-events: none;
        }
        .input-icon svg { width: 16px; height: 16px; }
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 0.75rem;
            color: white;
            font-size: 0.9rem;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            outline: none;
            transition: all 0.2s;
        }
        .form-input::placeholder { color: rgba(255,255,255,0.2); }
        .form-input:focus {
            border-color: #6366f1;
            background: rgba(99, 102, 241, 0.08);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }
        .toggle-pw {
            position: absolute; right: 0.875rem; top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: rgba(255,255,255,0.3); transition: color 0.2s;
        }
        .toggle-pw:hover { color: rgba(255,255,255,0.7); }
        .toggle-pw svg { width: 16px; height: 16px; }

        /* Error */
        .error-msg { font-size: 0.78rem; color: #f87171; margin-top: 0.4rem; }

        /* Alert */
        .alert-status {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
            font-size: 0.82rem;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.25rem;
        }

        /* Remember + Forgot */
        .row-options {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .remember-label {
            display: flex; align-items: center; gap: 0.5rem;
            font-size: 0.82rem; color: rgba(255,255,255,0.5);
            cursor: pointer;
        }
        .remember-label input[type="checkbox"] {
            width: 15px; height: 15px;
            accent-color: #6366f1;
            cursor: pointer;
        }
        .forgot-link {
            font-size: 0.82rem; color: #818cf8;
            text-decoration: none; transition: color 0.2s;
        }
        .forgot-link:hover { color: #a5b4fc; }

        /* Submit button */
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
            font-size: 0.9rem; font-weight: 600;
            padding: 0.875rem;
            border: none; border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
            letter-spacing: 0.01em;
            display: flex; align-items: center; justify-content: center; gap: 0.5rem;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #4338ca, #4f46e5);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.45);
        }
        .btn-login:active { transform: translateY(0); }
        .btn-login svg { width: 16px; height: 16px; }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 1.75rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            font-size: 0.75rem;
            color: rgba(255,255,255,0.25);
        }
    </style>
</head>
<body>
    <!-- Background effects -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="grid-overlay"></div>

    <div class="login-card">
        <!-- Header -->
        <div class="logo-wrap">
           <img src="{{ asset('images/Logo-SIAP-Dark.jpg') }}" 
         alt="SIAP.COM" class="logo-icon">
            <div class="logo-text">SIAP<span style="color:#22d3ee">.com</span></div>
        </div>
        <div class="login-subtitle">Sistem Informasi Aduan Publik</div>

        <!-- Admin Badge -->    
        <div class="admin-badge">Portal Administrator</div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert-status">{{ session('status') }}</div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label class="form-label" for="email">Alamat Email</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </span>
                    <input id="email" class="form-input" type="email" name="email"
                           value="{{ old('email') }}" required autofocus autocomplete="username"
                           placeholder="admin@siap.com" />
                </div>
                @error('email')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group" x-data="{ show: false }">
                <label class="form-label" for="password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </span>
                    <input id="password" class="form-input" :type="show ? 'text' : 'password'"
                           name="password" required autocomplete="current-password"
                           placeholder="••••••••" />
                    <button type="button" class="toggle-pw" @click="show = !show">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember & Forgot -->
            <div class="row-options">
                <label class="remember-label">
                    <input type="checkbox" name="remember" id="remember_me">
                    Ingat saya
                </label>
             
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-login">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                Masuk ke Dashboard
            </button>
        </form>

        <!-- Footer -->
        <div class="login-footer">
            &copy; {{ date('Y') }} SIAP.COM &mdash; Akses khusus administrator
        </div>
    </div>
</body>
</html>
