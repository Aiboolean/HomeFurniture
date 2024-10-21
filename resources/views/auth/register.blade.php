@include('home.header')

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- HomeFurniture Brand -->
        <div class="text-center mb-4">
            <p class="navbar-brand">Home<span>Furniture</span></p>
        </div>

        <!-- Name -->
        <div class="form-outline mb-4">
            <input type="text" id="name" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <label class="form-label" for="name">{{ __('Name') }}</label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control" name="email" :value="old('email')" required autocomplete="username" />
            <label class="form-label" for="email">{{ __('Email address') }}</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="form-outline mb-4">
            <input type="text" id="phone" class="form-control" name="phone" :value="old('phone')" required autocomplete="phone" />
            <label class="form-label" for="phone">{{ __('Phone No.') }}</label>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="form-outline mb-4">
            <input type="text" id="address" class="form-control" name="address" :value="old('address')" required autocomplete="address" />
            <label class="form-label" for="address">{{ __('Address') }}</label>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-outline mb-4">
            <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password" />
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-outline mb-4">
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password" />
            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Register') }}</button>
        </div>

        <!-- Already Registered -->
        <div class="text-center">
            <p>{{ __('Already registered?') }} <a href="{{ route('login') }}">{{ __('Log in') }}</a></p>
        </div>
    </form>
</x-guest-layout>
