@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-red-50 py-8 px-4 sm:px-6 lg:px-8">

        <div class="max-w-7xl mx-auto">

            <!-- Page Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center space-x-3 mb-2">
                            <i class="fas fa-heart text-red-500 text-3xl"></i>
                            <h1 class="text-4xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                                मेरे पसंदीदा | My Favorites
                            </h1>
                        </div>
                        <p class="text-gray-600 ml-12">Your saved spiritual content and resources</p>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="hidden md:flex space-x-2">
                        <button onclick="filterFavorites('all')" class="filter-btn active px-4 py-2 rounded-lg font-semibold text-sm transition-all duration-200">
                            <i class="fas fa-th mr-2"></i>All
                        </button>
                        <button onclick="filterFavorites('mantras')" class="filter-btn px-4 py-2 rounded-lg font-semibold text-sm transition-all duration-200">
                            <i class="fas fa-om mr-2"></i>Mantras
                        </button>
                        <button onclick="filterFavorites('articles')" class="filter-btn px-4 py-2 rounded-lg font-semibold text-sm transition-all duration-200">
                            <i class="fas fa-book-open mr-2"></i>Articles
                        </button>
                        <button onclick="filterFavorites('videos')" class="filter-btn px-4 py-2 rounded-lg font-semibold text-sm transition-all duration-200">
                            <i class="fas fa-video mr-2"></i>Videos
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

                <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-orange-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold mb-1">Total Favorites</p>
                            <p class="text-3xl font-bold text-gray-800">24</p>
                        </div>
                        <div class="w-14 h-14 bg-orange-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-heart text-orange-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-red-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold mb-1">Mantras</p>
                            <p class="text-3xl font-bold text-gray-800">8</p>
                        </div>
                        <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-om text-red-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold mb-1">Articles</p>
                            <p class="text-3xl font-bold text-gray-800">12</p>
                        </div>
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-book-open text-green-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold mb-1">Videos</p>
                            <p class="text-3xl font-bold text-gray-800">4</p>
                        </div>
                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-video text-purple-600 text-2xl"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Favorites Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Mantra Card 1 -->
                <div class="favorite-item mantra bg-white rounded-2xl shadow-xl overflow-hidden border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-red-500 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-om text-white text-7xl opacity-30"></i>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                            Mantra
                        </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Maha Mrityunjaya Mantra</h3>
                        <p class="text-gray-600 text-sm mb-4">A powerful mantra for protection and healing from Lord Shiva</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span><i class="fas fa-clock mr-1"></i>5 min</span>
                                <span><i class="fas fa-play mr-1"></i>234 plays</span>
                            </div>
                            <button class="text-orange-600 hover:text-orange-700 font-semibold">
                                Play <i class="fas fa-play ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Article Card 1 -->
                <div class="favorite-item article bg-white rounded-2xl shadow-xl overflow-hidden border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-teal-500 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1604608672516-f1b9b1a89d36?w=400&h=300&fit=crop" alt="Article" class="w-full h-full object-cover opacity-80">
                        <div class="absolute top-4 right-4">
                            <button class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                            Article
                        </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Understanding Karma Yoga</h3>
                        <p class="text-gray-600 text-sm mb-4">Learn about the path of selfless action and its spiritual significance</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span><i class="fas fa-clock mr-1"></i>8 min read</span>
                                <span><i class="fas fa-eye mr-1"></i>1.2k views</span>
                            </div>
                            <button class="text-green-600 hover:text-green-700 font-semibold">
                                Read <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Video Card 1 -->
                <div class="favorite-item video bg-white rounded-2xl shadow-xl overflow-hidden border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                            <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center">
                                <i class="fas fa-play text-white text-2xl ml-1"></i>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                            Video
                        </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Morning Meditation Guide</h3>
                        <p class="text-gray-600 text-sm mb-4">Start your day with peace and positive energy through guided meditation</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span><i class="fas fa-clock mr-1"></i>15 min</span>
                                <span><i class="fas fa-eye mr-1"></i>3.5k views</span>
                            </div>
                            <button class="text-purple-600 hover:text-purple-700 font-semibold">
                                Watch <i class="fas fa-play ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mantra Card 2 -->
                <div class="favorite-item mantra bg-white rounded-2xl shadow-xl overflow-hidden border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-red-400 to-orange-500 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-om text-white text-7xl opacity-30"></i>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                            Mantra
                        </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Gayatri Mantra</h3>
                        <p class="text-gray-600 text-sm mb-4">The most powerful Vedic mantra for wisdom and enlightenment</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span><i class="fas fa-clock mr-1"></i>3 min</span>
                                <span><i class="fas fa-play mr-1"></i>567 plays</span>
                            </div>
                            <button class="text-orange-600 hover:text-orange-700 font-semibold">
                                Play <i class="fas fa-play ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Article Card 2 -->
                <div class="favorite-item article bg-white rounded-2xl shadow-xl overflow-hidden border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-cyan-500 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1545159284-3c5f6e4c7f2e?w=400&h=300&fit=crop" alt="Article" class="w-full h-full object-cover opacity-80">
                        <div class="absolute top-4 right-4">
                            <button class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                            Article
                        </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">The Power of Bhakti</h3>
                        <p class="text-gray-600 text-sm mb-4">Explore the devotional path to spiritual awakening and divine love</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span><i class="fas fa-clock mr-1"></i>12 min read</span>
                                <span><i class="fas fa-eye mr-1"></i>890 views</span>
                            </div>
                            <button class="text-blue-600 hover:text-blue-700 font-semibold">
                                Read <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mantra Card 3 -->
                <div class="favorite-item mantra bg-white rounded-2xl shadow-xl overflow-hidden border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-500 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-om text-white text-7xl opacity-30"></i>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                                <i class="fas fa-heart text-white"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-semibold rounded-full">
                            Mantra
                        </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Om Namah Shivaya</h3>
                        <p class="text-gray-600 text-sm mb-4">Sacred chant for inner transformation and divine connection</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span><i class="fas fa-clock mr-1"></i>10 min</span>
                                <span><i class="fas fa-play mr-1"></i>1.8k plays</span>
                            </div>
                            <button class="text-orange-600 hover:text-orange-700 font-semibold">
                                Play <i class="fas fa-play ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Empty State (Hidden by default, show when no favorites) -->
            <div id="empty-state" class="hidden text-center py-20">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-gray-100 rounded-full mb-6">
                    <i class="fas fa-heart-broken text-gray-400 text-5xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">No Favorites Yet</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    Start exploring our spiritual content and save your favorite mantras, articles, and videos here.
                </p>
                <a href="#" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white font-bold rounded-xl hover:shadow-lg transition-all duration-200">
                    <i class="fas fa-compass mr-2"></i>Explore Content
                </a>
            </div>

        </div>

    </div>

    <script>
        function filterFavorites(category) {
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-orange-600', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-600');
            });
            event.target.closest('.filter-btn').classList.add('active', 'bg-orange-600', 'text-white');
            event.target.closest('.filter-btn').classList.remove('bg-gray-100', 'text-gray-600');

            // Filter items
            const items = document.querySelectorAll('.favorite-item');
            items.forEach(item => {
                if (category === 'all' || item.classList.contains(category)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Set initial active state
        document.querySelector('.filter-btn.active').classList.add('bg-orange-600', 'text-white');
        document.querySelector('.filter-btn.active').classList.remove('bg-gray-100', 'text-gray-600');
    </script>

    <style>
        .filter-btn {
            @apply bg-gray-100 text-gray-600 hover:bg-orange-100 hover:text-orange-600;
        }

        .filter-btn.active {
            @apply bg-orange-600 text-white;
        }
    </style>

@endsection
