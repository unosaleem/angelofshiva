@extends('layouts.app')

@section('content')

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-50 via-white to-red-50 px-4">

        <div class="w-full max-w-md">

            <!-- Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-orange-100 p-8">

                <!-- Title -->
                <div class="text-center mb-6">
                    <div class="w-16 h-16 mx-auto bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-lock text-orange-600 text-xl"></i>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Forgot Password?
                    </h2>

                    <p class="text-sm text-gray-500 mt-2">
                        Enter your email and we’ll send you a reset link.
                    </p>
                </div>

                <!-- Success Message -->
                @if (session('status'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('forgot.password') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                            Email Address
                        </label>

                        <div class="relative">
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   class="w-full px-4 py-3 rounded-xl border
                               @error('email') border-red-500 @else border-gray-300 @enderror
                               focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none">

                            <div class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full py-3 bg-gradient-to-r from-orange-500 to-red-500
                               text-white font-semibold rounded-xl
                               hover:shadow-lg hover:scale-[1.02] transition-all duration-200">
                        Send Reset Link
                    </button>

                </form>

                <!-- Back to Login -->
                <div class="text-center mt-6">
                    <a href="{{ route('login') }}"
                       class="text-sm text-orange-600 hover:text-orange-700 font-semibold">
                        ← Back to Login
                    </a>
                </div>

            </div>

            <!-- Footer -->
            <p class="text-center text-xs text-gray-400 mt-6">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>

        </div>

    </div>

@endsection
