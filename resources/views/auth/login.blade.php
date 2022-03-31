<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{ asset('images/logo.png') }}">
        <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="bg-container">
            <div class="login-card ml-auto mr-auto">
                <div class="col-10">

                    <x-slot name="logo">

                    </x-slot>
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" width="120">
                        </a>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group ml-auto">

                            <x-label class="ml-5" for="email" :value="__('Email')" />

                            <x-input id="email" class="block ml-5 mt-4 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 ml-auto">
                            <x-label class="ml-3" for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-0 ml-5  w-full" type="password" name="password"
                                required autocomplete="current-password" />
                        </div>


                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="ml-5 inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-3 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <x-button class="btn btn-primary ml-5">
                            {{ __('Log in') }}
                        </x-button>

                        <div class="d-flex flex-row justify-content-between mt-4">
                            @if (Route::has('password.request'))
                            <a class="text-dark" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif


                        </div>
                        <x-auth-validation-errors class="mt-4" :errors="$errors" />
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>


</x-guest-layout>