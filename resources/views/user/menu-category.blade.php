@extends('layouts.app')

@section('content')
    <style>
        /* Smooth entrance animation for the grid items */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-card {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
    </style>
    <div class="bg-gray-100 min-h-screen py-10">

{{--    <div class="min-h-screen" style="background-image: url('https://www.brahmakumaris.com/mahashivratri/ms-articles/mahashivratri-secrets/'); background-size: cover; background-position: center;">--}}
        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-16 space-y-3">
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">
                    {!! $title !!}
                </h1>
                {{--                <p class="text-slate-500 text-lg max-w-2xl mx-auto">Explore our diverse collection of spiritual wisdom and resources to guide your journey.</p>--}}
                <div class="h-1 w-28 bg-gradient-to-r from-red-600 to-indigo-600 mx-auto rounded-full mt-6"></div>
            </div>

            @if($category->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach ($category as $index => $item)
                        @php
                            // Professional Soft Gradient for Default Images
                            $colorClass = 'from-gray-400 via-red-400 to-orange-400';
                        @endphp

                        <a href="{{ url('category/' . $item->category_url) }}"
                           class="group professional-animation block"
                           style="animation-delay: {{ $index * 0.12 }}s">

                            <div class="relative bg-white rounded-3xl shadow-[0_15px_60px_-15px_rgba(0,0,0,0.08)] hover:shadow-[0_30px_90px_-10px_rgba(0,0,0,0.15)] overflow-hidden transition-all duration-500 flex flex-col h-full border border-slate-100 hover:border-blue-200 hover:-translate-y-2">

                                <div class="relative h-48 overflow-hidden">
                                    @if(!empty($item->image ))
                                        <img src="{{ Storage::disk('s3')->url('resources/assets/category/'.$item->image) }}"
                                             alt="{{ $item->category_name }}"
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br {{ $colorClass }} flex items-center justify-center">
                                        <span class="text-white text-7xl font-bold opacity-30">
                                            {{ Str::substr($item->category_name, 0, 1) }}
                                        </span>
                                        </div>
                                    @endif

                                    <div class="absolute top-5 left-5 backdrop-blur-md bg-green-500 border border-white/30 px-3 py-1 rounded-full text-xs font-bold text-white uppercase tracking-widest shadow-lg">
                                        {{ $item->language ?? 'Universal' }}
                                    </div>

                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                </div>

                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-600 leading-snug group-hover:text-gray-600 transition-colors duration-300">
                                            {{ $item->category_name }}
                                        </h3>
                                        {{--                                        <p class="text-slate-500 text-sm mt-3 font-medium leading-relaxed">Discover profound insights and spiritual teachings from the Brahma Kumaris.</p>--}}
                                    </div>

                                    <div class="mt-3 flex items-center justify-between">
                                        <div class="flex items-center space-x-3 text-red-700 font-bold text-sm tracking-wide transition-transform group-hover:translate-x-1.5 duration-300">
                                            <span>Explore Now</span>
                                            <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center border border-red-900 group-hover:bg-red-600 group-hover:text-white group-hover:border-transparent transition-all duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform group-hover:rotate-[-45deg]" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="max-w-xl mx-auto text-center py-28 bg-white rounded-[3rem] shadow-[0_20px_70px_-15px_rgba(0,0,0,0.1)] border border-slate-50 px-12 professional-animation">
                    <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner border border-slate-200">
                        <svg class="h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">No Content Found</h3>
                    <p class="mt-4 text-slate-600 leading-relaxed text-md">We couldn't find any categories in this section right now. Please check back later.</p>
                    <a href="{{ url('/') }}" class="mt-10 inline-block px-10 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-blue-600 transition-colors shadow-lg shadow-slate-300">Go Back Home</a>
                </div>
            @endif

        </div>
    </div>
@endsection
