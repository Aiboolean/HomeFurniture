@include('home.header')
<x-guest-layout>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- HomeFurniture Brand -->
        <div class="text-center mb-4">
            <p class="navbar-brand">Home<span>Furniture</span></p>
        </div>

        <!-- Email Address -->
        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <label class="form-label" for="email">{{ __('Email address') }}</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password" />
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me and Forgot Password -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>
            </div>

            <div class="col text-end">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                @endif
            </div>
        </div>

        <!-- Submit button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Log in') }}</button>
        </div>

        <!-- Register and Social buttons -->
        <div class="text-center">
            <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
</x-guest-layout>
