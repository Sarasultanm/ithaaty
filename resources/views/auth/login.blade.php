<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 text-gray-500 fill-current" /> -->
                <img src="{{ asset('images/logo.png')}}" style="width:200px;">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-white" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" class="text-white"/>

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" class="text-white" />

                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-start mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-white underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class="mt-4 ">
                <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md bg-custom-green active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25" href="/register">
                    {{ __('Sign Up') }}
                <a>
                <x-button class="float-right ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
