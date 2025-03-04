@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#15202b] flex items-center justify-center p-4">
    <div class="max-w-md w-full space-y-8 ">
        
        <!-- Logo Twitter -->
        <div class="flex items-center justify-center space-x-4 mb-4 group rounded-lg p-2 ">
            <svg viewBox="0 0 24 24" class="h-8 w-8 text-white" fill="currentColor">
                <g>
                    <path
                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z" />
                </g>
            </svg>
        </div>
        

        <div class="bg-blue-500 rounded-xl shadow-lg p-8 border border-gray-800">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                Sign in to Jajanken
            </h2>

            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email" class="sr-only">{{ __('Email Address') }}</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="bg-black text-white w-full px-4 py-3 rounded-lg border border-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 placeholder-gray-500"
                            placeholder="Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="bg-black text-white w-full px-4 py-3 rounded-lg border border-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 placeholder-gray-500"
                            placeholder="Password">
                        @error('password')
                            <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-800 rounded bg-black"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 block text-sm text-gray-300">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-white hover:text-red-400">
                                {{ __('Forgot password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-white/90 hover:bg-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
             
                    </span>
                    <span class="text-black font-bold">Sign in</span>
                </button>
            </form>

            <div class="mt-6">
                <p class="text-center text-sm text-gray-400">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-white hover:text-green-500">
                        Sign up
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection