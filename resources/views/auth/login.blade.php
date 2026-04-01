<x-guest-layout>
    <div class="min-h-screen flex login-container">

        <!-- LADO ESQUERDO -->
        <div class="hidden md:flex w-1/2 login-left items-center justify-center p-10">
            <div class="text-white max-w-md">
                <h1 class="mb-4">Óla, Contabilista!</h1>
                <p>
                    Acesse sua conta e gerencie tudo de forma simples e rápida.
                </p>
            </div>
        </div>

        <!-- LADO DIREITO -->
        <div class="w-full md:w-1/2 flex items-center justify-center login-right">

            <div class="w-full max-w-md login-card">

                <!-- LOGO -->
                <div class="flex justify-center mb-6">
                    <a href="/">
                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo" class="w-32 mx-auto" width="100px">
                    </a>
                </div>

                <!-- STATUS -->
                <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

                <!-- ERROS -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="mb-4">
                        <x-label for="email" value="Email" />
                        <x-input id="email"
                            class="block mt-1 w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required autofocus />
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-4">
                        <x-label for="password" value="Password" />
                        <x-input id="password"
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required />
                    </div>

                    <!-- REMEMBER -->
                    <div class="flex items-center justify-between mb-4 text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="mr-2">
                            Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- BOTÕES -->
                    <div class="flex items-center justify-between">
                        <x-button>
                            Login
                        </x-button>

                        <a href="{{ route('register') }}">
                            Sign up
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</x-guest-layout>



<style>
    /* BACKGROUND GERAL */
.login-container {
    background: linear-gradient(135deg, #feb001, #feb001);
}

/* LADO ESQUERDO */
.login-left {
    background: linear-gradient(135deg, #feb001, #fe8c01);
    position: relative;
    overflow: hidden;
}

/* ELEMENTOS DECORATIVOS */
.login-left::before {
    content: '';
    position: absolute;
    width: 300px;
    height: 300px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    top: -50px;
    left: -50px;
}

.login-left::after {
    content: '';
    position: absolute;
    width: 200px;
    height: 200px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
    bottom: -40px;
    right: -40px;
}

/* TEXTO */
.login-left h1 {
    font-size: 42px;
    font-weight: bold;
}

.login-left p {
    opacity: 0.8;
}

/* LADO DIREITO */
.login-right {
    background: #f4f6fb;
}

/* CARD */
.login-card {
    background: white;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.login-card:hover {
    transform: translateY(-5px);
}

/* INPUTS */
.login-card input {
    border-radius: 10px !important;
    border: 1px solid #ddd !important;
    padding: 12px !important;
    width: 100%;
    transition: 0.3s;
}

.login-card input:focus {
    border-color: #feb001 !important;
    box-shadow: 0 0 0 3px rgba(79,70,229,0.2);
}

/* BOTÃO */
.login-card button {
    background: #feb001 !important;
    color: white;
    border-radius: 10px;
    padding: 10px 20px;
    transition: 0.3s;
}

.login-card button:hover {
    background: #feb001 !important;
}

/* LINKS */
.login-card a {
    color: #feb001;
    font-weight: 500;
}
</style>