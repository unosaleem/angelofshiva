@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-red-50 py-8 px-4 sm:px-6 lg:px-8">

        <div class="max-w-6xl mx-auto">

            <!-- Header Section with Om Symbol -->
            <div class="text-center mb-8">

                <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent mb-3">
                    Angel Of Shiva
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    अध्यात्मिक यात्रा प्रारंभ करें | Begin Your Spiritual Journey
                </p>
            </div>

            <!-- Main Registration Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-orange-100">

                <!-- Decorative Header -->
                <div class="bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 p-8 text-white relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
                        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 translate-y-1/3"></div>
                    </div>
                    <div class="relative z-10 text-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-2">नया खाता बनाएं</h2>
                        <p class="text-orange-100 text-lg">Create Your Account</p>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="p-6 md:p-10">

                    <!-- Error Display -->
                    @if($errors->any())
                        <div class="mb-8 p-5 rounded-2xl bg-red-50 border-2 border-red-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-semibold text-red-800 mb-2">कृपया निम्नलिखित त्रुटियों को ठीक करें:</h3>
                                    <ul class="list-disc list-inside space-y-1 text-red-700 text-sm">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="space-y-8">
                        @csrf

                        <!-- Personal Information Section -->
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="flex-grow border-t border-orange-200"></div>
                                <span class="flex-shrink mx-4 text-orange-600 font-semibold text-sm uppercase tracking-wide">
                                <i class="fas fa-user-circle mr-2"></i>व्यक्तिगत जानकारी | Personal Details
                            </span>
                                <div class="flex-grow border-t border-orange-200"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Full Name -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        पूरा नाम <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-orange-400"></i>
                                        </div>
                                        <input type="text"
                                               name="name"
                                               value="{{ old('name') }}"
                                               placeholder="Enter your full name"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 @error('name') border-red-400 @enderror"
                                               required>
                                    </div>
                                    @error('name')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <i class="fas fa-info-circle mr-1"></i>{{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        ईमेल पता <span class="text-red-500">*</span>
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
                                               required>
                                    </div>
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <i class="fas fa-info-circle mr-1"></i>{{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <!-- Mobile -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        मोबाइल नंबर
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-mobile-alt text-orange-400"></i>
                                        </div>
                                        <input type="text"
                                               name="mobile"
                                               value="{{ old('mobile') }}"
                                               placeholder="+91 98765 43210"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200">
                                    </div>
                                </div>

                                <!-- Date of Birth -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        जन्म तिथि
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-calendar-alt text-orange-400"></i>
                                        </div>
                                        <input type="date"
                                               name="dob"
                                               value="{{ old('dob') }}"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200">
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        लिंग
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-venus-mars text-orange-400"></i>
                                        </div>
                                        <select name="gender"
                                                class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 appearance-none bg-white">
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender')=='Male'?'selected':'' }}>पुरुष | Male</option>
                                            <option value="Female" {{ old('gender')=='Female'?'selected':'' }}>महिला | Female</option>
                                            <option value="Other" {{ old('gender')=='Other'?'selected':'' }}>अन्य | Other</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                            <i class="fas fa-chevron-down text-orange-400 text-sm"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Location Information Section -->
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="flex-grow border-t border-orange-200"></div>
                                <span class="flex-shrink mx-4 text-orange-600 font-semibold text-sm uppercase tracking-wide">
                                <i class="fas fa-map-marker-alt mr-2"></i>स्थान विवरण | Location Details
                            </span>
                                <div class="flex-grow border-t border-orange-200"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Country -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        देश
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-globe text-orange-400"></i>
                                        </div>
                                        <input type="text"
                                               name="country"
                                               value="{{ old('country', 'India') }}"
                                               placeholder="India"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200">
                                    </div>
                                </div>

                                <!-- State -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        राज्य
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-map text-orange-400"></i>
                                        </div>
                                        <input type="text"
                                               name="state"
                                               value="{{ old('state') }}"
                                               placeholder="Enter your state"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200">
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        शहर
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-city text-orange-400"></i>
                                        </div>
                                        <input type="text"
                                               name="city"
                                               value="{{ old('city') }}"
                                               placeholder="Enter your city"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200">
                                    </div>
                                </div>

                                <!-- Postal Code -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        पिन कोड
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-mail-bulk text-orange-400"></i>
                                        </div>
                                        <input type="text"
                                               name="postal_code"
                                               value="{{ old('postal_code') }}"
                                               placeholder="123456"
                                               maxlength="6"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Security Information Section -->
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="flex-grow border-t border-orange-200"></div>
                                <span class="flex-shrink mx-4 text-orange-600 font-semibold text-sm uppercase tracking-wide">
                                <i class="fas fa-lock mr-2"></i>सुरक्षा विवरण | Security Details
                            </span>
                                <div class="flex-grow border-t border-orange-200"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Password -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        पासवर्ड <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-key text-orange-400"></i>
                                        </div>
                                        <input type="password"
                                               name="password"
                                               placeholder="Minimum 8 characters"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 @error('password') border-red-400 @enderror"
                                               required>
                                    </div>
                                    @error('password')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <i class="fas fa-info-circle mr-1"></i>{{ $message }}
                                    </p>
                                    @enderror
                                    <p class="text-xs text-gray-500 flex items-center mt-1">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Use at least 8 characters with letters & numbers
                                    </p>
                                </div>

                                <!-- Confirm Password -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        पासवर्ड की पुष्टि करें <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i class="fas fa-shield-alt text-orange-400"></i>
                                        </div>
                                        <input type="password"
                                               name="password_confirmation"
                                               placeholder="Re-enter your password"
                                               class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200"
                                               required>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="bg-orange-50 border-2 border-orange-200 rounded-2xl p-6">
                            <label class="flex items-start cursor-pointer group">
                                <input type="checkbox"
                                       class="mt-1 w-5 h-5 text-orange-600 border-2 border-orange-300 rounded focus:ring-orange-500 focus:ring-2"
                                       required>
                                <span class="ml-3 text-sm text-gray-700">
                                मैं <a href="#" class="text-orange-600 font-semibold hover:text-orange-700 underline">नियम और शर्तें</a> और
                                <a href="#" class="text-orange-600 font-semibold hover:text-orange-700 underline">गोपनीयता नीति</a> से सहमत हूँ।
                                <br>
                                <span class="text-xs text-gray-600">I agree to the Terms & Conditions and Privacy Policy.</span>
                            </span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="space-y-4">
                            <button type="submit"
                                    class="w-full py-4 px-6 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center group">
                                <span>खाता बनाएं | Create Account</span>
                                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-200"></i>
                            </button>

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="text-gray-600">
                                    क्या आपके पास पहले से खाता है? | Already have an account?
                                    <a href="{{ route('login') }}"
                                       class="text-orange-600 font-semibold hover:text-orange-700 hover:underline transition-all duration-200">
                                        लॉगिन करें | Login
                                    </a>
                                </p>
                            </div>
                        </div>

                    </form>

                </div>

                <!-- Footer Decoration -->
                <div class="bg-gradient-to-r from-orange-100 to-red-100 p-4 text-center">
                    <p class="text-sm text-gray-600 flex items-center justify-center">
                        <i class="fas fa-om text-orange-500 mr-2"></i>
                        हर हर महादेव | Blessed by Divine Grace
                        <i class="fas fa-om text-orange-500 ml-2"></i>
                    </p>
                </div>

            </div>

            <!-- Footer Note -->


        </div>

    </div>

@endsection
