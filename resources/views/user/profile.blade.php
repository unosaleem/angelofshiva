@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-red-50 py-8 px-4 sm:px-6 lg:px-8">

        <div class="max-w-7xl mx-auto">

            <!-- Page Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-3 mb-2">
                    <i class="fas fa-user-circle text-orange-600 text-3xl"></i>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                        मेरा प्रोफाइल | My Profile
                    </h1>
                </div>
                <p class="text-gray-600 ml-12">Manage your account and spiritual journey</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT SIDEBAR - Profile Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-orange-100 sticky top-8">

                        <!-- Cover Image -->
                        <div class="h-32 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 relative">
                            <div class="absolute inset-0 opacity-20">
                                <svg width="100%" height="100%">
                                    <pattern id="pattern-profile" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                                        <circle cx="20" cy="20" r="1" fill="white"/>
                                    </pattern>
                                    <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-profile)"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="relative px-6 pb-6">
                            <div class="flex justify-center -mt-16">
                                <div class="relative">
                                    <div class="w-32 h-32 rounded-full border-4 border-white shadow-xl bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center overflow-hidden">
                                        @if(auth()->user()->profile_picture)
                                            <img src="{{ auth()->user()->profile_picture }}" alt="Profile" class="w-full h-full object-cover">
                                        @else
                                            <span class="text-5xl text-white font-bold">
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        </span>
                                        @endif
                                    </div>
                                    <button class="absolute bottom-0 right-0 bg-orange-500 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:bg-orange-600 transition-colors">
                                        <i class="fas fa-camera"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- User Info -->
                            <div class="text-center mt-4">
                                <h2 class="text-2xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
                                <p class="text-gray-500 text-sm mt-1">{{ auth()->user()->email }}</p>

                                <!-- Spiritual Level Badge -->
                                <div class="mt-4 inline-flex items-center space-x-2 bg-gradient-to-r from-orange-100 to-red-100 px-4 py-2 rounded-full">
                                    <i class="fas fa-om text-orange-600"></i>
                                    <span class="text-sm font-semibold text-orange-700">Devotee</span>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-200">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-orange-600">45</div>
                                    <div class="text-xs text-gray-500 mt-1">Days Active</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-orange-600">12</div>
                                    <div class="text-xs text-gray-500 mt-1">Courses</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-orange-600">8</div>
                                    <div class="text-xs text-gray-500 mt-1">Favorites</div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="mt-6 space-y-3">
                                <a href="{{ route('favorites') }}" class="block w-full py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white text-center rounded-xl font-semibold hover:shadow-lg transition-all duration-200">
                                    <i class="fas fa-heart mr-2"></i>View Favorites
                                </a>
                                <button class="block w-full py-3 bg-white border-2 border-orange-500 text-orange-600 text-center rounded-xl font-semibold hover:bg-orange-50 transition-all duration-200">
                                    <i class="fas fa-edit mr-2"></i>Edit Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT CONTENT - Tabs & Information -->
                <div class="lg:col-span-2">

                    <!-- Tabs Navigation -->
                    <div class="bg-white rounded-2xl shadow-lg border border-orange-100 mb-6 overflow-hidden">
                        <div class="flex border-b border-gray-200">
                            <button onclick="showTab('personal')" id="tab-personal" class="tab-button flex-1 py-4 px-6 text-sm font-semibold text-orange-600 border-b-2 border-orange-600 bg-orange-50">
                                <i class="fas fa-user mr-2"></i>Personal Info
                            </button>
                            <button onclick="showTab('location')" id="tab-location" class="tab-button flex-1 py-4 px-6 text-sm font-semibold text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                <i class="fas fa-map-marker-alt mr-2"></i>Location
                            </button>
                            <button onclick="showTab('security')" id="tab-security" class="tab-button flex-1 py-4 px-6 text-sm font-semibold text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                <i class="fas fa-lock mr-2"></i>Security
                            </button>
                            <button onclick="showTab('activity')" id="tab-activity" class="tab-button flex-1 py-4 px-6 text-sm font-semibold text-gray-600 hover:text-orange-600 hover:bg-orange-50 transition-colors">
                                <i class="fas fa-chart-line mr-2"></i>Activity
                            </button>
                        </div>
                    </div>

                    <!-- Tab Contents -->

                    <!-- Personal Info Tab -->
                    <div id="content-personal" class="tab-content">
                        <div class="bg-white rounded-3xl shadow-xl p-8 border border-orange-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-800">
                                    <i class="fas fa-id-card text-orange-600 mr-3"></i>Personal Information
                                </h3>
                                <button class="text-orange-600 hover:text-orange-700 font-semibold">
                                    <i class="fas fa-edit mr-2"></i>Edit
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Full Name</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-user text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->name }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Email Address</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-envelope text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Mobile Number</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-mobile-alt text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->mobile ?? 'Not provided' }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Date of Birth</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-calendar-alt text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->dob ?? 'Not provided' }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Gender</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-venus-mars text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->gender ?? 'Not specified' }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Member Since</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-clock text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Location Tab -->
                    <div id="content-location" class="tab-content hidden">
                        <div class="bg-white rounded-3xl shadow-xl p-8 border border-orange-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-800">
                                    <i class="fas fa-map-marked-alt text-orange-600 mr-3"></i>Location Details
                                </h3>
                                <button class="text-orange-600 hover:text-orange-700 font-semibold">
                                    <i class="fas fa-edit mr-2"></i>Edit
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Country</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-globe text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->country ?? 'Not provided' }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">State</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-map text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->state ?? 'Not provided' }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">City</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-city text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->city ?? 'Not provided' }}</span>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-500">Postal Code</label>
                                    <div class="flex items-center space-x-3 p-4 bg-gray-50 rounded-xl">
                                        <i class="fas fa-mail-bulk text-orange-400"></i>
                                        <span class="text-gray-800 font-medium">{{ auth()->user()->postal_code ?? 'Not provided' }}</span>
                                    </div>
                                </div>

                            </div>

                            <!-- Map Placeholder -->
                            <!-- Map Section -->
                            <div class="mt-8">
                                <label class="text-sm font-semibold text-gray-500 block mb-3">
                                    Your Location
                                </label>

                                @if(auth()->user()->postal_code)

                                    <div class="h-64 rounded-2xl overflow-hidden border">

                                        <iframe
                                            width="100%"
                                            height="100%"
                                            frameborder="0"
                                            style="border:0"
                                            loading="lazy"
                                            allowfullscreen
                                            src="https://www.google.com/maps?q={{ auth()->user()->postal_code }}&output=embed">
                                        </iframe>

                                    </div>

                                @else

                                    <div class="h-64 bg-gray-100 rounded-2xl flex items-center justify-center border-2 border-dashed border-gray-300">
                                        <div class="text-center text-gray-400">
                                            <i class="fas fa-map-marked-alt text-5xl mb-3"></i>
                                            <p class="text-sm">Postal code not available</p>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Security Tab -->
                    <div id="content-security" class="tab-content hidden">
                        <div class="bg-white rounded-3xl shadow-xl p-8 border border-orange-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-800">
                                    <i class="fas fa-shield-alt text-orange-600 mr-3"></i>Security Settings
                                </h3>
                            </div>

                            <!-- Change Password -->
                            <div class="mb-8 p-6 bg-gradient-to-r from-orange-50 to-red-50 rounded-2xl border border-orange-200">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg mb-2">
                                            <i class="fas fa-key text-orange-500 mr-2"></i>Change Password
                                        </h4>
                                        <p class="text-gray-600 text-sm">Update your password regularly to keep your account secure</p>
                                    </div>
                                    <button class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors font-semibold">
                                        Change
                                    </button>
                                </div>
                            </div>

                            <!-- Two-Factor Authentication -->
                            <div class="mb-8 p-6 bg-gray-50 rounded-2xl border border-gray-200">

                                <div class="flex items-start justify-between">

                                    <div>
                                        <h4 class="font-bold text-gray-800 text-lg mb-2">
                                            <i class="fas fa-mobile-alt text-orange-500 mr-2"></i>
                                            Two-Factor Authentication
                                        </h4>

                                        <p class="text-gray-600 text-sm">
                                            Add an extra layer of security to your account
                                        </p>

                                        @if(auth()->user()->otpstatus == 1)
                                            <span class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-600 text-xs rounded-full">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                Enabled
                                            </span>
                                        @else
                                            <span class="inline-block mt-2 px-3 py-1 bg-gray-200 text-gray-600 text-xs rounded-full">
                                                <i class="fas fa-times-circle mr-1"></i>
                                                Not Enabled
                                            </span>
                                        @endif

                                    </div>

                                    <div>
                                        @if(auth()->user()->otpstatus == 1)

                                            <form method="POST" action="{{ url('otpstatus.disable') }}">
                                                @csrf
                                                <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                                    Disable
                                                </button>
                                            </form>

                                        @else

                                            <form method="POST" action="{{ url('otpstatus.enable') }}">
                                                @csrf
                                                <button class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                                                    Enable
                                                </button>
                                            </form>

                                        @endif
                                    </div>

                                </div>

                            </div>

                            <!-- Active Sessions -->
                            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-200">

                                <h4 class="font-bold text-gray-800 text-lg mb-4">
                                    <i class="fas fa-desktop text-orange-500 mr-2"></i>
                                    Active Sessions
                                </h4>

                                <div class="space-y-3">

                                    @forelse($sessions as $session)

                                        <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow-sm">

                                            <!-- LEFT -->
                                            <div class="flex items-center space-x-4">

                                                <!-- ICON -->
                                                <div class="w-10 h-10 rounded-full flex items-center justify-center
                        {{ $session->is_current ? 'bg-green-100' : 'bg-gray-100' }}">

                                                    <i class="fas fa-desktop
                           {{ $session->is_current ? 'text-green-600' : 'text-gray-500' }}">
                                                    </i>
                                                </div>

                                                <!-- INFO -->
                                                <div>
                                                    <div class="font-semibold text-gray-800">
                                                        {{ $session->platform }} - {{ $session->browser }}
                                                    </div>

                                                    <div class="text-sm text-gray-500">
                                                        {{ $session->ip_address ?? 'Unknown IP' }}
                                                        • {{ $session->last_active }}

                                                        @if($session->is_current)
                                                            • <span class="text-green-600 font-semibold">
                                    Current Session
                                  </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- RIGHT STATUS -->
                                            <div class="text-right">

                    <span class="text-xs font-semibold
                        {{ $session->is_current ? 'text-green-600' : 'text-gray-400' }}">

                        <i class="fas fa-circle text-xs mr-1"></i>
                        {{ $session->is_current ? 'Active' : 'Inactive' }}

                    </span>

                                            </div>

                                        </div>

                                    @empty

                                        <div class="text-center text-gray-400 py-6">
                                            No active sessions found.
                                        </div>

                                    @endforelse

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Activity Tab -->
                    <div id="content-activity" class="tab-content hidden">
                        <div class="bg-white rounded-3xl shadow-xl p-8 border border-orange-100">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">
                                <i class="fas fa-history text-orange-600 mr-3"></i>Recent Activity
                            </h3>

                            <div class="space-y-4">
                                <div class="flex items-start space-x-4 p-4 bg-gradient-to-r from-orange-50 to-transparent rounded-xl border-l-4 border-orange-500">
                                    <div class="flex-shrink-0 w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-book-open text-orange-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-800">Completed Bhagavad Gita Chapter 2</div>
                                        <div class="text-sm text-gray-500 mt-1">2 hours ago</div>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-4 bg-gradient-to-r from-red-50 to-transparent rounded-xl border-l-4 border-red-500">
                                    <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-heart text-red-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-800">Added to Favorites: Morning Meditation</div>
                                        <div class="text-sm text-gray-500 mt-1">5 hours ago</div>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-4 bg-gradient-to-r from-green-50 to-transparent rounded-xl border-l-4 border-green-500">
                                    <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-800">Achieved 7-day Meditation Streak</div>
                                        <div class="text-sm text-gray-500 mt-1">1 day ago</div>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-4 bg-gradient-to-r from-purple-50 to-transparent rounded-xl border-l-4 border-purple-500">
                                    <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user-plus text-purple-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-800">Joined Spiritual Discussion Group</div>
                                        <div class="text-sm text-gray-500 mt-1">3 days ago</div>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-4 bg-gradient-to-r from-yellow-50 to-transparent rounded-xl border-l-4 border-yellow-500">
                                    <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-trophy text-yellow-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-800">Earned "Dedicated Devotee" Badge</div>
                                        <div class="text-sm text-gray-500 mt-1">1 week ago</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-center">
                                <button class="text-orange-600 hover:text-orange-700 font-semibold">
                                    View All Activity <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Remove active state from all tab buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('text-orange-600', 'border-b-2', 'border-orange-600', 'bg-orange-50');
                button.classList.add('text-gray-600');
            });

            // Show selected tab content
            document.getElementById('content-' + tabName).classList.remove('hidden');

            // Add active state to selected tab button
            const activeButton = document.getElementById('tab-' + tabName);
            activeButton.classList.remove('text-gray-600');
            activeButton.classList.add('text-orange-600', 'border-b-2', 'border-orange-600', 'bg-orange-50');
        }
    </script>

@endsection
