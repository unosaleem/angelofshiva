@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-red-50">

        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-orange-600 via-red-500 to-orange-700 text-white py-20 overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%">
                    <pattern id="blog-pattern" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <circle cx="30" cy="30" r="2" fill="white"/>
                    </pattern>
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#blog-pattern)"/>
                </svg>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full translate-x-1/2 translate-y-1/2"></div>

            <div class="relative container mx-auto px-4 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6">
                    <i class="fas fa-book-open text-4xl"></i>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-4">आध्यात्मिक ब्लॉग</h1>
                <h2 class="text-3xl md:text-4xl font-semibold mb-4">Spiritual Blog</h2>
                <p class="text-xl text-orange-100 max-w-2xl mx-auto">
                    Explore divine wisdom, spiritual teachings, and sacred knowledge
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">

            <!-- Search & Filter Bar -->
            <div class="mb-12">
                <div class="bg-white rounded-3xl shadow-xl p-6 border border-orange-100">
                    <form method="GET" action="{{ route('blog.index') }}" class="flex flex-col md:flex-row gap-4 items-center">

                        <!-- Search Box -->
                        <div class="flex-1 w-full">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-orange-400"></i>
                                </div>
                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Search articles, mantras, teachings..."
                                       class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200">
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="w-full md:w-auto">
                            <select name="category"
                                    onchange="this.form.submit()"
                                    class="w-full md:w-56 px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 appearance-none bg-white cursor-pointer">
                                <option value="all" {{ request('category') == 'all' || !request('category') ? 'selected' : '' }}>
                                    All Categories
                                </option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort -->
                        <div class="w-full md:w-auto">
                            <select name="sort"
                                    onchange="this.form.submit()"
                                    class="w-full md:w-40 px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:ring-4 focus:ring-orange-100 transition-all duration-200 appearance-none bg-white cursor-pointer">
                                <option value="latest" {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>
                                    Latest
                                </option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>
                                    Popular
                                </option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                                    Oldest
                                </option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <div class="w-full md:w-auto">
                            <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-200">
                                <i class="fas fa-search mr-2"></i>Search
                            </button>
                        </div>

                        <!-- Clear Filters -->
                        @if(request('search') || (request('category') && request('category') != 'all') || (request('sort') && request('sort') != 'latest'))
                            <div class="w-full md:w-auto">
                                <a href="{{ route('blog.index') }}"
                                   class="block text-center md:inline-block px-6 py-3 border-2 border-orange-500 text-orange-600 font-semibold rounded-xl hover:bg-orange-50 transition-all duration-200">
                                    <i class="fas fa-times mr-2"></i>Clear
                                </a>
                            </div>
                        @endif
                    </form>

                    <!-- Active Filters Display -->
                    @if(request('search') || (request('category') && request('category') != 'all'))
                        <div class="mt-4 flex flex-wrap items-center gap-3">
                            <span class="text-sm font-semibold text-gray-700">Active Filters:</span>

                            @if(request('search'))
                                <span class="inline-flex items-center px-4 py-2 bg-orange-100 text-orange-700 text-sm font-semibold rounded-full">
                                    <i class="fas fa-search mr-2"></i>
                                    "{{ request('search') }}"
                                    <a href="{{ route('blog.index', array_merge(request()->except('search'))) }}"
                                       class="ml-2 text-orange-600 hover:text-orange-800">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </span>
                            @endif

                            @if(request('category') && request('category') != 'all')
                                <span class="inline-flex items-center px-4 py-2 bg-orange-100 text-orange-700 text-sm font-semibold rounded-full">
                                    <i class="fas fa-tag mr-2"></i>
                                    {{ request('category') }}
                                    <a href="{{ route('blog.index', array_merge(request()->except('category'))) }}"
                                       class="ml-2 text-orange-600 hover:text-orange-800">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </span>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Results Count -->
                <div class="mt-4">
                    <p class="text-gray-600 text-sm">
                        Showing <span class="font-semibold text-orange-600">{{ $blogs->firstItem() ?? 0 }}</span>
                        to <span class="font-semibold text-orange-600">{{ $blogs->lastItem() ?? 0 }}</span>
                        of <span class="font-semibold text-orange-600">{{ $blogs->total() }}</span> articles
                    </p>
                </div>
            </div>

            @if($blogs->count() > 0)
{{--                @php--}}
{{--                    $featuredBlog = $blogs->where('is_featured', true)->first() ?? $blogs->first();--}}
{{--                    $regularBlogs = $blogs->where('id', '!=', $featuredBlog->id);--}}
{{--                @endphp--}}

{{--                    <!-- Featured Blog -->
                @if($featuredBlog && $blogs->currentPage() == 1)
                    <div class="mb-12">
                        <div class="flex items-center mb-6">
                            <div class="h-1 w-12 bg-gradient-to-r from-orange-600 to-red-600 rounded-full mr-4"></div>
                            <h3 class="text-2xl font-bold text-gray-800">Featured Article</h3>
                        </div>

                        <a href="{{ route('blog.show', $featuredBlog->id) }}" class="block group">
                            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-orange-100 hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                                <div class="grid md:grid-cols-2 gap-0">

                                    <!-- Image -->
                                    <div class="relative h-64 md:h-full overflow-hidden">
                                        @if($featuredBlog->image)
                                            <img src="{{ asset('storage/' . $featuredBlog->image) }}"
                                                 alt="{{ $featuredBlog->title }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1604608672516-f1b9b1a89d36?w=800&h=600&fit=crop"
                                                 alt="{{ $featuredBlog->title }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        @endif
                                        <div class="absolute top-4 left-4">
                                            <span class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white text-sm font-bold rounded-full shadow-lg">
                                                <i class="fas fa-star mr-1"></i>Featured
                                            </span>
                                        </div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-8 md:p-10 flex flex-col justify-center">
                                        <div class="flex items-center space-x-3 mb-4">
                                            @if($featuredBlog->category)
                                                <span class="px-3 py-1 bg-orange-100 text-orange-600 text-xs font-bold rounded-full">
                                                    {{ $featuredBlog->category }}
                                                </span>
                                            @endif
                                            @if($featuredBlog->reading_time)
                                                <span class="text-gray-400 text-sm">
                                                    <i class="far fa-clock mr-1"></i>{{ $featuredBlog->reading_time }} min read
                                                </span>
                                            @endif
                                        </div>

                                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 group-hover:text-orange-600 transition-colors duration-300">
                                            {{ $featuredBlog->title }}
                                        </h2>

                                        <p class="text-gray-600 text-lg mb-6 line-clamp-3">
                                            {{ $featuredBlog->excerpt ?? Str::limit(strip_tags($featuredBlog->content), 200) }}
                                        </p>

                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white font-bold">
                                                    {{ strtoupper(substr($featuredBlog->author ?? 'AS', 0, 2)) }}
                                                </div>
                                                <div>
                                                    <p class="text-sm font-semibold text-gray-800">{{ $featuredBlog->author ?? 'Angel Of Shiva' }}</p>
                                                    <p class="text-xs text-gray-500">{{ $featuredBlog->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>

                                            <div class="flex items-center space-x-4 text-gray-400">
                                                <span class="text-sm">
                                                    <i class="far fa-eye mr-1"></i>{{ $featuredBlog->views ?? 0 }}
                                                </span>
                                                <span class="text-sm">
                                                    <i class="far fa-heart mr-1"></i>{{ $featuredBlog->likes ?? 0 }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endif--}}

                <!-- Blog Grid -->
                <div class="mb-12">
                    <div class="flex items-center mb-6">
                        <div class="h-1 w-12 bg-gradient-to-r from-orange-600 to-red-600 rounded-full mr-4"></div>
                        <h3 class="text-2xl font-bold text-gray-800">
                            {{ $blogs->currentPage() == 1 && $blogs->lastPage() > 1 ? 'Latest Articles' : 'All Articles' }}
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

{{--                        @foreach($regularBlogs as $blog)--}}
                        @foreach($blogs as $blog)
                            <!-- Blog Card -->
                            <a href="{{ route('blog.show', $blog->id) }}" class="group">
                                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-orange-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 h-full flex flex-col">

                                    <!-- Image -->
                                    {{--<div class="relative h-56 overflow-hidden">
                                        @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}"
                                                 alt="{{ $blog->title }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1545159284-3c5f6e4c7f2e?w=600&h=400&fit=crop"
                                                 alt="{{ $blog->title }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                        <div class="absolute bottom-4 left-4 right-4">
                                            @if($blog->category)
                                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-xs font-bold rounded-full">
                                                    {{ $blog->category }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>--}}

                                    <!-- Content -->
                                    <div class="p-6 flex-1 flex flex-col">
                                        <div class="flex items-center text-gray-400 text-sm mb-3">

                                                <i class="far fa-clock mr-1"></i>
                                                <span>{{ ceil(str_word_count(strip_tags($blog->blog_description)) / 200) }} min read</span>

                                                <span class="mx-2">•</span>

{{--                                            <span>{{ $blog->category }}</span>--}}
                                            <span>{{ $blog->created_at->diffForHumans() }}</span>
                                        </div>

                                        <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition-colors duration-300 line-clamp-2">
                                            {{ $blog->post_lable ?? $blog->title }}
                                        </h3>

                                        <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-1">
                                            {{ $blog->post_detail ?? Str::limit(strip_tags($blog->post_detail), 150) }}
                                        </p>

                                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                                    {{ strtoupper(substr($blog->author ?? 'AS', 0, 2)) }}
                                                </div>
                                                <span class="text-xs font-semibold text-gray-700">{{ $blog->author ?? 'Angel Of Shiva' }}</span>
                                            </div>
                                            <div class="flex items-center space-x-3 text-gray-400 text-sm">
                                                <span><i class="far fa-eye mr-1"></i>{{ $blog->views ?? 100 }}</span>
                                                <span><i class="far fa-heart mr-1"></i>{{ $blog->likes ?? 30 }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $blogs->links() }}
                </div>

            @else
                <!-- No Results Found -->
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-32 h-32 bg-gray-100 rounded-full mb-6">
                        <i class="fas fa-search text-gray-400 text-5xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">No Articles Found</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        We couldn't find any articles matching your search. Try adjusting your filters or search terms.
                    </p>
                    <a href="{{ route('blog.index') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white font-bold rounded-xl hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>View All Articles
                    </a>
                </div>
            @endif

        </div>

        <!-- Newsletter Section -->
        <div class="bg-gradient-to-r from-orange-600 via-red-500 to-orange-700 py-16 mt-12">
            <div class="container mx-auto px-4 text-center">
                <div class="max-w-2xl mx-auto">
                    <i class="fas fa-bell text-5xl text-white mb-6"></i>
                    <h3 class="text-3xl font-bold text-white mb-4">Subscribe to Our Newsletter</h3>
                    <p class="text-orange-100 mb-8">Get the latest spiritual wisdom and updates delivered to your inbox</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                        @csrf
                        <input type="email"
                               name="email"
                               placeholder="Enter your email"
                               required
                               class="flex-1 px-6 py-4 rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-300">
                        <button type="submit" class="px-8 py-4 bg-white text-orange-600 font-bold rounded-xl hover:shadow-2xl transition-all duration-200">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
