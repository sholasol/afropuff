<x-front-layout>
    <!-- Login Section -->
    <section class="auth-section">
       <div class="container">
           <div class="row justify-content-center align-items-center min-vh-100">
               <div class="col-lg-5 col-md-7">
                   <div class="auth-card">
                       <div class="text-center mb-4">
                           <h2 class="auth-title">AfroPuff</h2>
                           <p class="auth-subtitle">Create an account</p>
                       </div>
                       
                       <form class="auth-form" method="POST" action="{{ route('register') }}">
                           @csrf
                           <div class="mb-3">
                               <label for="name" class="form-label">Name</label>
                               <input type="text" name="name" :value="old('name')" class="form-control"  required>
                               <x-input-error :messages="$errors->get('name')" class="mt-2" />
                           </div>
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
                           <div class="mb-3">
                               <label for="password" class="form-label">Confirm Password</label>
                               <div class="input-group">
                                   <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                   <button class="btn btn-outline-light" type="button" onclick="togglePassword()">
                                       <i class="fas fa-eye" id="toggleIcon"></i>
                                   </button>
                               </div>
                               <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                           </div>
                           
                           <button type="submit" class="btn btn-orange btn-lg w-100 mb-3">
                               Sign Up
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
                           <p class="mb-0">Already have an account? <a href="{{route('login')}}" class="text-orange">Sign In</a></p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
</x-front-layout>



{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
