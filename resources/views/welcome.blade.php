@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black flex items-center justify-center p-4">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo tipo Twitter (X) -->
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>

        <div class="bg-black rounded-xl shadow-lg p-8 border border-gray-800">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                Sign in to X
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
                            <a href="{{ route('password.request') }}" class="font-medium text-blue-500 hover:text-blue-400">
                                {{ __('Forgot password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-white/90 hover:bg-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Twitter Bird -->
                        <svg class="h-5 w-5 text-black group-hover:text-gray-900 transition-all" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </span>
                    <span class="text-black font-bold">Sign in</span>
                </button>
            </form>

            <div class="mt-6">
                <p class="text-center text-sm text-gray-400">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:text-blue-400">
                        Sign up
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection