@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-red-50">

        {{-- ================= HERO SECTION ================= --}}
        <div class="relative h-[45vh] sm:h-[55vh] md:h-[40vh] overflow-hidden">

            <img src="{{ $blog->image ? asset('storage/'.$blog->image) : 'https://www.brahmakumaris.com/wp-content/uploads/2024/05/Rajyoga-Meditation-Journey-Within-Daily-Life.jpg' }}"
                 class="w-full h-full object-cover"
                 alt="{{ $blog->blog_heading }}">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>

            <div class="absolute inset-0 flex items-end">
                <div class="container mx-auto px-4 pb-8 md:pb-14">

                    <div class="max-w-4xl text-white">

                        {{-- Category --}}
                        <span class="inline-block px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-sm font-bold rounded-full shadow-lg mb-4">
                        {{ $blog->category?->name ?? 'Spirituality' }}
                    </span>

                        {{-- Title --}}
                        <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold leading-tight mb-4">
                            {{ $blog->blog_heading }}
                        </h1>

                        {{-- Meta --}}
                        <div class="flex flex-wrap items-center gap-4 text-sm text-white/90">

                        <span>
                            <i class="far fa-calendar mr-1"></i>
                            {{ $blog->created_at->format('M d, Y') }}
                        </span>

                            <span>
                            <i class="far fa-eye mr-1"></i>
                            {{ $blog->views ?? 0 }} views
                        </span>

                            <span>
                            <i class="far fa-clock mr-1"></i>
                            {{ ceil(str_word_count(strip_tags($blog->blog_description)) / 200) }} min read
                        </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="container mx-auto px-4 py-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- LEFT SHARE SIDEBAR --}}



                {{-- MAIN ARTICLE --}}
                <div class="lg:col-span-9 order-1 lg:order-2">

                    <article class="bg-white rounded-2xl shadow-xl p-6 md:p-10 border border-orange-100">

                        {{-- Heading --}}
                        <h2 class="text-2xl font-bold mb-4">
                            {{ $blog->blog_heading }}
                        </h2>
                        <div class="prose max-w-none prose-lg prose-orange">
                            {!! $blog->blog_description !!}
                        </div>

                        {{-- Tags --}}
                        @if($blog->tags)
                            <div class="mt-10 pt-6 border-t">
                                <div class="flex flex-wrap gap-2">
                                    @foreach(explode(',', $blog->tags) as $tag)
                                        <span class="px-3 py-1 bg-orange-100 text-orange-600 text-xs rounded-full">
                                    {{ trim($tag) }}
                                </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </article>


                    {{-- COMMENTS SECTION --}}
                    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mt-8 border border-orange-100">

                        <h3 class="text-xl font-bold mb-6">
                            Comments ({{ $blogcomments->count() ?? 0 }})
                        </h3>

                        {{-- Comment Form --}}
                        <form method="POST" action="{{ route('blog.comment', $blog->id) }}">
                            @csrf
                                <input type="text"
                               name="name"
                               required
                               class="w-full border-2 border-gray-200 rounded-xl p-3 mb-4 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                               placeholder="Your Name">

                            @error('name')
                            <p class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                            <input type="email"
                               name="email"
                               required
                               class="w-full border-2 border-gray-200 rounded-xl p-3 mb-4 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                               placeholder="Your Email">

                            @error('email')
                            <p class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                            <input type="tel"
                               name="phone"
                               class="w-full border-2 border-gray-200 rounded-xl p-3 mb-4 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                               placeholder="Your Phone (optional)">

                            <textarea name="comment"
                                      rows="4"
                                      required
                                      class="w-full border-2 border-gray-200 rounded-xl p-3 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                      placeholder="Write your comment..."></textarea>

                            @error('comment')
                            <p class="text-sm text-red-500 mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                            <div class="text-right mt-4">
                                <button class="px-6 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg">
                                    Post Comment
                                </button>
                            </div>
                        </form>

                        {{-- Comment List --}}
                        <div class="mt-8 space-y-6">

                            @foreach($blogcomments as $comment)
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <div class="flex justify-between text-sm mb-2">
                                        <strong>{{ $comment->name }}</strong>
                                        <span>{{ $comment->created_at }}</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">
                                        {{ $comment->comment_desc }}
                                    </p>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- RIGHT SIDEBAR --}}
                <div class="lg:col-span-3 order-3">

                    <div class="lg:sticky lg:top-24 space-y-6">

                        {{-- RELATED POSTS --}}
                        <div class="bg-white rounded-2xl shadow-lg  border border-orange-100">

                            <h3 class="text-lg bg-red-700 text-white px-4 py-2 rounded-t-lg   font-bold mb-6 flex items-center gap-2">
                                <i class="fas fa-book-reader text-orange-500"></i>
                                Related Articles
                            </h3>

                            <div class="space-y-5 p-6">

                                @foreach($relatedBlogs as $related)

                                    <a href="{{ route('blog.show', $related->id) }}"
                                       class="flex gap-4 group shadow-sm border-bottom border-orange-200 items-start">

                                        {{-- Content --}}
                                        <div class="flex-1">

                                            {{-- Category Badge --}}
                                            <span class="text-[10px] uppercase tracking-wide bg-orange-100 text-orange-600 px-2 py-1 rounded-full font-semibold">
                        {{ $related->category ?? 'Spiritual' }}
                    </span>

                                            {{-- Title --}}
                                            <h4 class="text-sm font-semibold mt-2 text-gray-800 group-hover:text-orange-600 transition-colors line-clamp-2">
                                                {{ $related->blog_heading }}
                                            </h4>

                                            {{-- Meta --}}
                                            <div class="flex items-center gap-3 text-xs text-gray-500 mt-2">

                        <span>
                            <i class="far fa-calendar mr-1"></i>
                            {{ $related->created_at->format('M d, Y') }}
                        </span>

                                                <span>
                            <i class="far fa-clock mr-1"></i>
                            {{ ceil(str_word_count(strip_tags($related->post_detail)) / 200) }} min
                        </span>

                                            </div>

                                        </div>

                                    </a>

                                @endforeach

                            </div>

                        </div>

                        {{-- SHARE SECTION --}}

                        <div class="bg-white rounded-xl shadow p-4 border border-orange-100">
                            <p class="text-sm font-semibold mb-3">Share</p>

                            <div class="flex lg:flex-col gap-3">

                                {{-- Facebook --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                   target="_blank"
                                   class="flex items-center gap-2 px-3 py-2 bg-[#1877F2] text-white rounded-lg shadow hover:opacity-90 transition-all">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </a>

                                {{-- X (Twitter Replacement) --}}
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->blog_heading) }}"
                                   target="_blank"
                                   class="flex items-center gap-2 px-3 py-2 bg-black text-white rounded-lg shadow hover:bg-gray-900 transition-all">
                                    <i class="fa-brands fa-x-twitter">X</i>
                                    Twitter
                                </a>

                                {{-- LinkedIn --}}
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($blog->blog_heading) }}"
                                   target="_blank"
                                   class="flex items-center gap-2 px-3 py-2 bg-[#0A66C2] text-white rounded-lg shadow hover:opacity-90 transition-all">
                                    <i class="fab fa-linkedin-in"></i>
                                    LinkedIn
                                </a>

                                {{-- WhatsApp --}}
                                <a href="https://wa.me/?text={{ urlencode($blog->blog_heading . ' ' . request()->fullUrl()) }}"
                                   target="_blank"
                                   class="flex items-center gap-2 px-3 py-2 bg-[#25D366] text-white rounded-lg shadow hover:opacity-90 transition-all">
                                    <i class="fab fa-whatsapp"></i>
                                    WhatsApp
                                </a>

                            </div>
                        </div>

                        <!-- Newsletter -->
                        <div class="bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl shadow-lg p-6 text-white">
                            <i class="fas fa-bell text-3xl mb-3"></i>
                            <h3 class="text-lg font-bold mb-2">Subscribe</h3>
                            <p class="text-orange-100 text-sm mb-4">Get weekly spiritual wisdom</p>
                            <input type="email" placeholder="Your email" class="w-full px-4 py-2 rounded-lg mb-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-white">
                            <button
                                class="w-full py-2 bg-white text-orange-600 font-semibold rounded-lg hover:shadow-lg transition-all duration-200">
                                Subscribe
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
