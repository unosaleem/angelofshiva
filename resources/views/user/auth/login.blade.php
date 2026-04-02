@extends('layouts.app')

@section('content')

    <div class="min-h-screen flex">

        <!-- LEFT PANEL - Branding & Content -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-orange-600 via-red-500 to-orange-700 relative overflow-hidden">

            <!-- Decorative Background Elements -->
            <div class="absolute inset-0">
                <!-- Animated Circles -->
                <div class="absolute w-96 h-96 bg-white/10 rounded-full -top-20 -left-20 animate-pulse"></div>
                <div class="absolute w-80 h-80 bg-white/10 rounded-full top-1/3 -right-20"></div>
                <div class="absolute w-64 h-64 bg-white/10 rounded-full bottom-10 left-1/4 animate-pulse" style="animation-delay: 1s;"></div>

                <!-- Pattern Overlay -->
                <div class="absolute inset-0 opacity-10">
                    <svg width="100%" height="100%">
                        <pattern id="pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                            <circle cx="20" cy="20" r="1" fill="white"/>
                        </pattern>
                        <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern)"/>
                    </svg>
                </div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col items-center justify-center w-full p-12 text-white">

                <!-- Main Heading -->
                <div class="text-center max-w-lg space-y-6">

                    <div class="h-1 w-32 bg-white/50 mx-auto rounded-full"></div>

                    <h2 class="text-3xl font-semibold">
                        आध्यात्मिक यात्रा में आपका स्वागत है
                    </h2>

                    <p class="text-xl text-orange-100 leading-relaxed">
                        Welcome to Your Spiritual Journey
                    </p>

                    <!-- Features List -->
                    <div class="mt-12 space-y-6 text-left">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-book-open text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Divine Knowledge</h3>
                                <p class="text-orange-100 text-sm">Access sacred texts and spiritual wisdom</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-pray text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Meditation & Peace</h3>
                                <p class="text-orange-100 text-sm">Find inner peace through guided meditation</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Spiritual Community</h3>
                                <p class="text-orange-100 text-sm">Connect with like-minded devotees</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-om text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Daily Blessings</h3>
                                <p class="text-orange-100 text-sm">Receive daily spiritual guidance and mantras</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quote -->
                    <div class="mt-12 p-6 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                        <i class="fas fa-quote-left text-3xl text-orange-200 mb-3"></i>
                        <p class="text-lg italic leading-relaxed">
                            "जो भी व्यक्ति भक्ति और श्रद्धा से मेरी शरण में आता है, मैं उसे अवश्य प्राप्त होता हूँ।"
                        </p>
                        <p class="text-sm text-orange-200 mt-3">
                            — Bhagavad Gita
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- RIGHT PANEL - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 px-6 py-12">

            <div class="w-full max-w-md">

                <!-- Mobile Logo (visible only on small screens) -->


                <!-- Login Card -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">

                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">लॉगिन करें</h2>
                        <p class="text-gray-500">Welcome back! Please login to your account</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 p-4 rounded-xl bg-green-50 border-2 border-green-200">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 text-lg mr-3"></i>
                                <p class="text-green-700 text-sm">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                 {{--   <!-- Error Display -->
                    @if($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border-2 border-red-200">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-circle text-red-500 text-lg mr-3 mt-0.5"></i>
                                <div>
                                    <h3 class="text-sm font-semibold text-red-800 mb-1">Error!</h3>
                                    <ul class="space-y-1 text-red-700 text-sm">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif--}}

                    <form method="POST" action="{{ route('user.login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-orange-400"></i>
                                </div>
                                <input type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="your.email@example.com"
                                       class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 @error('email') border-red-400 @enderror"
                                       required
                                       autofocus>
                            </div>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <i class="fas fa-info-circle mr-1"></i>{{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-orange-400"></i>
                                </div>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       placeholder="Enter your password"
                                       class="w-full pl-12 pr-12 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 @error('password') border-red-400 @enderror"
                                       required>
                                <button type="button"
                                        onclick="togglePassword()"
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-orange-500 transition-colors">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                            <p class="text-red-500 text-xs mt-1 flex items-center">
                                <i class="fas fa-info-circle mr-1"></i>{{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox"
                                       name="remember"
                                       class="w-4 h-4 text-orange-600 border-2 border-orange-300 rounded focus:ring-orange-500 focus:ring-2">
                                <span class="ml-2 text-sm text-gray-700 group-hover:text-orange-600 transition-colors">
                                Remember me
                            </span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-sm text-orange-600 hover:text-orange-700 font-semibold hover:underline transition-all duration-200">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                                class="w-full py-4 px-6 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center group">
                            <span>Sign In</span>
                            <i class="fas fa-sign-in-alt ml-3 group-hover:translate-x-1 transition-transform duration-200"></i>
                        </button>

                        <!-- Divider -->
                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">OR</span>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="text-center space-y-4">
                            <p class="text-gray-600">
                                Don't have an account yet?
                            </p>
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center justify-center w-full py-3.5 px-6 bg-white border-2 border-orange-500 text-orange-600 font-semibold text-base rounded-xl hover:bg-orange-50 transition-all duration-200 group">
                                <span>Create New Account</span>
                                <i class="fas fa-user-plus ml-2 group-hover:scale-110 transition-transform duration-200"></i>
                            </a>
                        </div>

                    </form>

                    <!-- Footer Links -->
{{--                    <div class="mt-8 pt-6 border-t border-gray-200">--}}
{{--                        <div class="flex items-center justify-center space-x-6 text-sm">--}}
{{--                            <a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">--}}
{{--                                <i class="fas fa-phone-alt mr-1"></i>Help--}}
{{--                            </a>--}}
{{--                            <span class="text-gray-300">|</span>--}}
{{--                            <a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">--}}
{{--                                <i class="fas fa-shield-alt mr-1"></i>Privacy--}}
{{--                            </a>--}}
{{--                            <span class="text-gray-300">|</span>--}}
{{--                            <a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">--}}
{{--                                <i class="fas fa-file-contract mr-1"></i>Terms--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>


            </div>
        </div>

    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>

    <style>
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .animate-pulse {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>

@endsection
