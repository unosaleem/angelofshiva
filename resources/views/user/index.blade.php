@extends('layouts.app')

@section('content')
    <style>
        /* Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .glass-dark {
            background: rgba(73, 80, 87, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d10e31;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a00b27;
        }

        /* Live Pulse Animation */
        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .pulse-ring {
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            border: 3px solid #d10e31;
            border-radius: 50%;
            animation: pulse-ring 1.5s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }


        /* Smooth Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Date Badge Glow */
        .date-badge {
            box-shadow: 0 0 20px rgba(209, 14, 49, 0.3);
        }

        /* Media Card Hover Effect */
        .media-card {
            transition: all 0.3s ease;
        }

        .media-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(209, 14, 49, 0.2);
        }

        /* Background Gradient */
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        /* Tab Active State */
        .tab-active {
            background: linear-gradient(135deg, #d10e31 0%, #a00b27 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(209, 14, 49, 0.3);
        }

        /* Play Button Pulse */
        @keyframes pulse-play {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .play-button:hover {
            animation: pulse-play 0.6s ease-in-out;
        }

        /* Loading Skeleton */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }


    </style>
    <!-- SWIPER HERO BANNER -->
    <section class="w-full mx-auto mb-10">
        <div class="swiper mySwiper overflow-hidden">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img
                        src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/banner2.png"
                        alt="slider 1" class="w-full  object-cover"/>
                </div>
                <div class="swiper-slide">
                    <img
                        src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/banner3.png"
                        alt="slider 2" class="w-full object-cover"/>
                </div>
                <div class="swiper-slide">
                    <img
                        src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/banner1.png"
                        alt="slider 3" class="w-full  object-cover"/>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>



    <section class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Live Announcements Sidebar -->
            <aside class="w-full lg:w-80 xl:w-96">
                <div class="glass rounded-2xl shadow-xl p-6 sticky top-24">
                    <!-- Header -->
                    <div class="flex items-center gap-4 mb-6 pb-4 border-b border-[#d10e31]/20">

                        <div class="relative w-14 h-14 flex items-center justify-center">

                            <!-- Pulse Rings -->
                            <div class="pulse-ring absolute inset-0 m-auto"></div>
                            <div class="pulse-ring absolute inset-0 m-auto"></div>
                            <div class="pulse-ring absolute inset-0 m-auto"></div>

                            <!-- Center Icon -->
                            <span class="relative z-10 w-12 h-12 bg-gradient-to-br from-[#d10e31] to-red-700
                                     rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-bullhorn text-white text-lg"></i>
                        </span>

                        </div>

                        <div>
                            <h3 class="font-bold text-xl text-[#495057]">Live Updates</h3>
                            <p class="text-xs text-gray-500">Latest announcements</p>
                        </div>

                    </div>


                    <!-- Announcements List -->
                    <div class="h-96 overflow-y-auto custom-scrollbar space-y-3">
                        @forelse($announcements as $announcement)
                            <div
                                class="media-card glass-dark rounded-xl p-4 border-l-4 {{ $announcement->isnew == 'Yes' ? 'border-[#d10e31]' : 'border-orange-500' }}">
                                <div class="flex items-start justify-between mb-2">
                                    @if($announcement->isnew == 'Yes')
                                        <span
                                            class="bg-[#d10e31] text-white text-xs px-2 py-1 rounded-full font-semibold">NEW</span>
                                    @endif
                                    <span class="text-xs text-gray-500">{{ $announcement->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-[#495057] font-medium">{!! $announcement->title !!}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 text-center py-4">No announcements available</p>
                        @endforelse
                    </div>

                    <!-- View All Button -->
                    <div class="mt-4 pt-4 border-t border-[#d10e31]/20">
                        <a href="{{ url('announcements.all') }}"
                           class="block w-full bg-gradient-to-r from-[#d10e31] to-red-700 text-white py-2 rounded-lg font-semibold hover:shadow-lg transition-all text-center">
                            View All Announcements
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1">
                <div class="glass rounded-2xl shadow-xl overflow-hidden">
                    <!-- Tabs Header -->
                    <div class="bg-gradient-to-r from-[#d10e31]/10 to-red-100/30 p-6 border-b border-[#d10e31]/20">
                        <h2 class="text-2xl font-bold text-[#495057] mb-4">Media Library</h2>


                        <nav class="flex flex-wrap gap-2" id="mediaTabs">
                            <button
                                class="tab-button tab-active px-6 py-3 rounded-lg font-semibold transition-all flex items-center gap-2"
                                data-tab="audioTab">
                                <i class="fas fa-headphones"></i>
                                <span>Audio</span>
                                <span
                                    class="bg-white/30 px-2 py-0.5 rounded-full text-xs">{{ $audiosPaginated->total() }}</span>
                            </button>
                            <button
                                class="tab-button px-6 py-3 rounded-lg font-semibold transition-all flex items-center gap-2 bg-white/50 text-[#495057] hover:bg-white/70"
                                data-tab="videoTab">
                                <i class="fas fa-video"></i>
                                <span>Video</span>
                                <span
                                    class="bg-[#d10e31]/20 px-2 py-0.5 rounded-full text-xs">{{ $videosPaginated->total() }}</span>
                            </button>
                            <button
                                class="tab-button px-6 py-3 rounded-lg font-semibold transition-all flex items-center gap-2 bg-white/50 text-[#495057] hover:bg-white/70"
                                data-tab="pdfTab">
                                <i class="fas fa-file-pdf"></i>
                                <span>PDF</span>
                                <span
                                    class="bg-[#d10e31]/20 px-2 py-0.5 rounded-full text-xs">{{ $pdfsPaginated->total() }}</span>
                            </button>
                        </nav>
                    </div>

                    <!-- Tab Contents -->
                    <div class="p-6">
                        <!-- Audio Tab -->
                        <div id="audioTab" class="tab-content">
                            {{--@php

                                echo '<pre>';
                                print_r($audiosPaginated);
                                echo '</pre>';
                                exit();
                            @endphp--}}
                            @forelse($audiosPaginated as $dateGroup)

                                <div class="mb-8 fade-in">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div
                                            class="date-badge bg-gradient-to-r from-[#d10e31] to-red-700 text-white px-4 py-2 rounded-full font-semibold text-sm">
                                            <i class="fas fa-calendar-day mr-2"></i>
                                            {{ $dateGroup['date']->format('F d, Y') }}
                                        </div>
                                        <div
                                            class="flex-1 h-px bg-gradient-to-r from-[#d10e31]/50 to-transparent"></div>
                                        <span
                                            class="text-xs text-gray-500 font-medium">{{ $dateGroup['count'] }} Items</span>
                                    </div>

                                    <div class="grid gap-4">
                                        @foreach($dateGroup['items'] as $audio)
                                            <div
                                                class="audio-card relative overflow-hidden rounded-2xl border border-orange-100 bg-gradient-to-br from-white to-orange-50 shadow-md p-6 flex flex-col md:flex-row gap-6"
                                                data-audio-src="{{ Storage::disk('s3')->url('resources/assets/audio/'.$audio->category_id.'/'.$audio->subcategory_id.'/'. $audio->song) }}"
                                                data-title="{{ $audio->title }}"
                                                data-meta="{{ $audio->speaker1?->name }} • {{ $audio->category?->category_name }}"
                                                data-cover="
                                                    @if($audio->attach_pic)
                                                        {{ Storage::disk('s3')->url('resources/assets/audio_thumb/'.$audio->attach_pic) }}
                                                    @elseif($audio->subcategory?->setforall_audio)
                                                        {{ Storage::disk('s3')->url('resources/assets/subcategory/'.$audio->subcategory->setforall_audio) }}
                                                    @elseif($audio->category?->setforall_audio)
                                                        {{ Storage::disk('s3')->url('resources/assets/category/'.$audio->category->setforall_audio) }}
                                                    @else
                                                        {{ Storage::disk('s3')->url('resources/assets/category/default_front_cat.jpg') }}
                                                    @endif
                                                 "
                                            >
                                                <!-- Audio Card Header -->
                                                <div
                                                    class="absolute top-0 left-0 right-0 h-8 bg-gradient-to-r from-gray-600 to-red-400 px-6 flex items-center justify-center z-10 rounded-t-2xl">
                                                    <span
                                                        class="text-white text-xs font-bold uppercase tracking-wider w-full">
                                                        {{ $audio->category?->category_name }}
                                                        @if($audio->subcategory)
                                                            → {{ $audio->subcategory->subcategory_name }}
                                                        @endif
                                                    </span>

                                                    <div
                                                        class="absolute top-0 right-0 bg-{!! $audio->language =="H" ? 'gray' : 'red' !!}-600 text-[10px] font-black px-6 py-1 h-full rounded-bl-2xl text-white flex items-center">
{{--                                                        Published : {{$audio->publish_date?->format('j M Y')}}--}}
                                                        {!! $audio->language =="H" ? 'Hindi Language' : 'English Language'  !!}
                                                    </div>
                                                </div>

                                                <!-- IMAGE -->
                                                <div class="pt-10 md:pt-6 flex justify-center md:justify-start">
                                                    <div
                                                        class="relative w-32 h-32 sm:w-36 sm:h-36 flex items-center justify-center group cursor-pointer">

                                                        @if($audio->attach_pic)
                                                            <img
                                                                class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                                                src="{{ Storage::disk('s3')->url('resources/assets/audio_thumb/'.$audio->attach_pic) }}"
                                                                alt="Audio Image">

                                                        @elseif($audio->subcategory?->setforall_audio)
                                                            <img
                                                                class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                                                src="{{ Storage::disk('s3')->url('resources/assets/subcategory/'.$audio->subcategory->setforall_audio) }}"
                                                                alt="Subcategory Image">

                                                        @elseif($audio->category?->setforall_audio)
                                                            <img
                                                                class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                                                src="{{ Storage::disk('s3')->url('resources/assets/category/'.$audio->category->setforall_audio) }}"
                                                                alt="Category Image">

                                                        @else
                                                            <img
                                                                class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                                                src="{{ Storage::disk('s3')->url('resources/assets/category/default_front_cat.jpg') }}"
                                                                alt="Default Image">
                                                        @endif


                                                        <button type="button"
                                                                class=" play-audio-btn absolute inset-0 bg-gradient-to-br from-orange-500/70 to-orange-600/80 flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"
                                                                tabindex="-1">
                                                            <i class="fas fa-play text-3xl text-white"></i>
                                                        </button>
                                                        <!-- Pro Access Badge -->
                                                        <span class="absolute top-1 right-1 bg-{!! $audio->language =="H" ? 'green' : 'red' !!}-100 border border-{!! $audio->language =="H" ? 'green' : 'red' !!}-200 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                                                            <i class="fas fa-microphone text-{!! $audio->language =="H" ? 'green' : 'red' !!}-600"></i> {!! $audio->language =="H" ? 'अ' : 'E' !!}</span>
                                                    </div>
                                                </div>
                                                <div class="flex-1 flex flex-col mt-4">
                                                    <!-- Header moved to card bar above
                                                    <span class="text-orange-600 text-xs font-bold uppercase tracking-wider mb-1">Madhuban Bhattis → Prev. Years</span>
                                                    -->
                                                    <h2 class="text-sm font-extrabold text-gray-800 mb-1">{{ $audio->title }}</h2>
                                                    @if(!empty($audio->audience_place_event))
                                                        <p class="text-sm text-gray-600 mb-3">{{ $audio->audience_place_event }}</p>
                                                    @endif

                                                    <div class="flex flex-wrap items-center gap-2 mb-2">
                                                        @if(!empty($audio->speaker1))
                                                            <span
                                                                class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i
                                                                    class="fas fa-user-tie text-orange-600"></i> Speaker: <b
                                                                    class="text-gray-700">{{ $audio->speaker1?->name }}</b></span>
                                                        @endif
                                                        @if(!empty($audio->speaker2))
                                                            <span
                                                                class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i
                                                                    class="fas fa-user-tie text-orange-600"></i> Speaker: <b
                                                                    class="text-gray-700">{{ $audio->speaker2?->name }}</b></span>
                                                        @endif
                                                        @if(!empty($audio->murli_date))
                                                            <span
                                                                class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i
                                                                    class="fas fa-calendar-alt text-orange-600"></i> Murli: <b
                                                                    class="text-gray-700">{{ $audio->murli_date?->format('j M Y') }}</b></span>
                                                        @endif
                                                        @if(!empty($audio->class_date))
                                                            <span
                                                                class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i
                                                                    class="fas fa-clock text-orange-600"></i> Class: <b
                                                                    class="text-gray-700">{{ $audio->class_date?->format('j M Y') }}</b></span>
                                                        @endif
                                                    </div>

                                                    <div class="flex flex-wrap gap-2 mb-2">
                                                        @if($audio->attach_label1 && $audio->attach_file)
                                                            <button
                                                                class="resource-btn bg-gradient-to-r from-indigo-300 to-purple-300 text-white px-3 py-1 rounded-xl text-xs font-bold shadow-lg flex items-center gap-2"
                                                                data-title="{{ $audio->attach_label1 }}"
                                                                data-type="file"
                                                                data-content="{{ Storage::disk('s3')->url('resources/assets/attachments/'.$audio->attach_file) }}">
                                                                <i class="fas fa-folder-open"></i> {{ $audio->attach_label1 }}
                                                            </button>
                                                        @endif

                                                        @if($audio->attach_label2 && $audio->attach_file2)
                                                            <button
                                                                class="resource-btn bg-gradient-to-r from-green-300 to-blue-300 text-white px-3 py-1 rounded-xl text-xs font-bold shadow-lg flex items-center gap-2"
                                                                data-title="{{ $audio->attach_label2 }}"
                                                                data-type="file"
                                                                data-content="{{ Storage::disk('s3')->url('resources/assets/attachments/'.$audio->attach_file2) }}">
                                                                <i class="fas fa-book"></i> {{ $audio->attach_label2 }}
                                                            </button>
                                                        @endif

                                                        @if($audio->remark)
                                                            <button
                                                                class="resource-btn bg-orange-200 text-orange-900 px-3 py-1 rounded-xl text-xs font-bold flex items-center gap-2 shadow"
                                                                data-title="{{ $audio->remark_label ?? 'Remark' }}"
                                                                data-type="html"
                                                                data-content="{{ e($audio->remark) }}">
                                                                <i class="fas fa-info-circle"></i> {{ $audio->remark_label ?? 'Remark' }}
                                                            </button>
                                                        @endif

                                                        @if($audio->note_label)
                                                            <button
                                                                class="resource-btn bg-green-100 text-green-800 px-3 py-1 rounded-xl text-xs font-bold flex items-center gap-2 shadow"
                                                                data-title="{{ $audio->note_label ?? 'Notes' }}"
                                                                data-type="html"
                                                                data-content="{{ e($audio->note) }}">
                                                                <i class="fas fa-info-circle"></i> {{ $audio->note_label ?? 'Notes' }}
                                                            </button>
                                                        @endif
                                                        @if(!empty($audio->note2_label))
                                                            <button
                                                                class="info-btn bg-blue-100 hover:bg-blue-300 text-blue-800 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow"
                                                                data-info-index="3">
                                                                <i class="fas fa-info-circle"></i> {{ $audio->note2_label ?? 'Notes 2' }}
                                                            </button>
                                                        @endif
                                                        @if(!empty($audio->note3_label))
                                                            <button
                                                                class="info-btn bg-purple-100 hover:bg-purple-300 text-purple-800 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow"
                                                                data-info-index="4">
                                                                <i class="fas fa-info-circle"></i> {{ $audio->note3_label ?? 'Notes 3' }}
                                                            </button>
                                                        @endif
                                                    </div>


                                                    <div class="flex flex-wrap gap-2 mt-auto">
                                                        <button
                                                            class="play-audio-btn relative bg-gradient-to-r from-orange-600 to-orange-500 text-white px-6 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow hover:from-orange-700 hover:to-orange-600 transition"
                                                        >
                                                            <i class="fas fa-play"></i> Play Now
                                                        </button>
                                                        <a href="{{ Storage::disk('s3')->url('resources/assets/audio/'.$audio->category_id.'/'.$audio->subcategory_id.'/'. $audio->song) }}"
                                                           download
                                                           class="bg-white border-2 border-orange-200 text-orange-600 px-6 py-2 rounded-xl text-sm font-bold hover:bg-orange-50 shadow transition flex items-center gap-2">
                                                            <i class="fas fa-download"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <i class="fas fa-music text-gray-300 text-6xl mb-4"></i>
                                    <p class="text-gray-500">No audio files available</p>
                                </div>
                            @endforelse

                            <!-- Pagination -->
                            @if($audiosPaginated->hasPages())
                                <div class="mt-8">
                                    {{ $audiosPaginated->links() }}
                                </div>
                            @endif
                        </div>

                        <!-- Video Tab -->
                        <div id="videoTab" class="tab-content hidden">
                            @forelse($videosPaginated as $dateGroup)
                                <div class="mb-8 fade-in">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div
                                            class="date-badge bg-gradient-to-r from-[#d10e31] to-red-700 text-white px-4 py-2 rounded-full font-semibold text-sm">
                                            <i class="fas fa-calendar-day mr-2"></i>
                                            {{ $dateGroup['date']->format('F d, Y') }}
                                        </div>
                                        <div
                                            class="flex-1 h-px bg-gradient-to-r from-[#d10e31]/50 to-transparent"></div>
                                        <span
                                            class="text-xs text-gray-500 font-medium">{{ $dateGroup['count'] }} Items</span>
                                    </div>

                                    <div class="grid gap-4">
                                        @foreach($dateGroup['items'] as $video)
                                            <div class="media-card glass-dark rounded-xl p-4 border border-white/50">
                                                <div class="flex flex-col md:flex-row gap-4">
                                                    <div class="flex-shrink-0">
                                                        <div
                                                            class="relative w-full md:w-48 h-32 bg-gradient-to-br from-[#d10e31] to-red-700 rounded-xl overflow-hidden group cursor-pointer"
                                                            onclick="window.open('{{ $video->video_url }}', '_blank')">
                                                            @if($video->thumbnail)
                                                                <img
                                                                    src="{{ Storage::disk('s3')->url($video->thumbnail) }}"
                                                                    alt="{{ $video->title }}"
                                                                    class="w-full h-full object-cover opacity-80 group-hover:opacity-60 transition-opacity">
                                                            @endif
                                                            <div
                                                                class="absolute inset-0 flex items-center justify-center">
                                                                <div
                                                                    class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                                                    <i class="fas fa-play text-[#d10e31] text-2xl ml-1"></i>
                                                                </div>
                                                            </div>
                                                            @if($video->duration)
                                                                <span
                                                                    class="absolute bottom-2 right-2 bg-black/70 text-white px-2 py-1 rounded text-xs">{{ $video->duration }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="flex-1">
                                                        <h4 class="font-bold text-[#495057] text-lg mb-2">{{ $video->title }}</h4>
                                                        @if($video->description)
                                                            <p class="text-sm text-gray-600 mb-3">{{ Str::limit($video->description, 150) }}</p>
                                                        @endif
                                                        <div
                                                            class="flex flex-wrap items-center gap-4 text-xs text-gray-500 mb-3">
                                                            @if($video->speaker)
                                                                <span class="flex items-center gap-1">
                                                                <i class="fas fa-user"></i> {{ $video->speaker }}
                                                            </span>
                                                            @endif
                                                            @if($video->class_date)
                                                                <span class="flex items-center gap-1">
                                                                <i class="fas fa-calendar"></i> {{ Carbon\Carbon::parse($video->class_date)->format('d M Y') }}
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="flex gap-2">
                                                            <a href="{{ $video->video_url }}" target="_blank"
                                                               class="px-4 py-2 bg-gradient-to-r from-[#d10e31] to-red-700 text-white rounded-lg hover:shadow-lg transition-all text-sm font-semibold">
                                                                <i class="fas fa-play mr-2"></i>Watch Now
                                                            </a>
                                                            <button
                                                                onclick="shareVideo('{{ url('video.show', $video->id) }}')"
                                                                class="px-4 py-2 bg-white/50 hover:bg-white rounded-lg transition-colors text-sm">
                                                                <i class="fas fa-share-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <i class="fas fa-video text-gray-300 text-6xl mb-4"></i>
                                    <p class="text-gray-500">No videos available</p>
                                </div>
                            @endforelse

                            <!-- Pagination -->
                            @if($videosPaginated->hasPages())
                                <div class="mt-8">
                                    {{ $videosPaginated->links() }}
                                </div>
                            @endif
                        </div>

                        <!-- PDF Tab -->
                        <div id="pdfTab" class="tab-content hidden">
                            @forelse($pdfsPaginated as $dateGroup)
                                <div class="mb-8 fade-in">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div
                                            class="date-badge bg-gradient-to-r from-[#d10e31] to-red-700 text-white px-4 py-2 rounded-full font-semibold text-sm">
                                            <i class="fas fa-calendar-day mr-2"></i>
                                            {{ $dateGroup['date']->format('F d, Y') }}
                                        </div>
                                        <div
                                            class="flex-1 h-px bg-gradient-to-r from-[#d10e31]/50 to-transparent"></div>
                                        <span
                                            class="text-xs text-gray-500 font-medium">{{ $dateGroup['count'] }} Items</span>
                                    </div>

                                    <div class="grid md:grid-cols-2 gap-4">
                                        @foreach($dateGroup['items'] as $pdf)
                                            <div class="media-card glass-dark rounded-xl p-4 border border-white/50">
                                                <div class="flex gap-4">
                                                    <div class="flex-shrink-0">
                                                        <div
                                                            class="w-16 h-20 bg-gradient-to-br from-red-500 to-red-700 rounded-lg flex items-center justify-center shadow-lg">
                                                            <i class="fas fa-file-pdf text-white text-3xl"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <h4 class="font-bold text-[#495057] mb-1 truncate">{{ $pdf->title }}</h4>
                                                        @if($pdf->description)
                                                            <p class="text-xs text-gray-600 mb-2">{{ Str::limit($pdf->description, 80) }}</p>
                                                        @endif
                                                        <div class="flex items-center gap-3 text-xs text-gray-500 mb-2">
                                                            @if($pdf->category)
                                                                <span><i class="fas fa-folder mr-1"></i> {{ $pdf->category }}</span>
                                                            @endif
                                                        </div>
                                                        <a href="{{ Storage::disk('s3')->url($pdf->attach_file) }}"
                                                           download
                                                           class="w-full px-3 py-1.5 bg-gradient-to-r from-[#d10e31] to-red-700 text-white rounded-lg hover:shadow-lg transition-all text-xs font-semibold inline-block text-center">
                                                            <i class="fas fa-download mr-2"></i>Download PDF
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <i class="fas fa-file-pdf text-gray-300 text-6xl mb-4"></i>
                                    <p class="text-gray-500">No PDFs available</p>
                                </div>
                            @endforelse

                            <!-- Pagination -->
                            @if($pdfsPaginated->hasPages())
                                <div class="mt-8">
                                    {{ $pdfsPaginated->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
