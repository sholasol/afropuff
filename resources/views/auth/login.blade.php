<x-front-layout>
     <!-- Login Section -->
     <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-5 col-md-7">
                    <div class="auth-card">
                        <div class="text-center mb-4">
                            <h2 class="auth-title">Welcome Back</h2>
                            <p class="auth-subtitle">Sign in to your account</p>
                        </div>
                        
                        <form class="auth-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" :value="old('email')" class="form-control"  required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <button class="btn btn-outline-light" type="button" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password.html" class="text-orange">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-orange btn-lg w-100 mb-3">
                                Sign In
                            </button>
                        </form>

                        <div class="divider">
                            <span>or</span>
                        </div>

                        <div class="social-login">
                            <button class="btn btn-outline-light w-100 mb-2">
                                <i class="fab fa-google me-2"></i>Continue with Google
                            </button>
                            <button class="btn btn-outline-light w-100">
                                <i class="fab fa-facebook me-2"></i>Continue with Facebook
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <p class="mb-0">Don't have an account? <a href="{{route('register')}}" class="text-orange">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>


{{-- <x-guest-layout>
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

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
