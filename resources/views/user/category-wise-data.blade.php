@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-8">

        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Live Announcements Sidebar -->

            <!-- Live Announcements Sidebar -->
            <aside class="w-full lg:w-80 xl:w-96">
                <div class="glass rounded-2xl shadow-xl sticky top-24">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-6">
                        <h3 class="text-lg font-bold text-gray-800 border-b pb-2 flex items-center gap-2">
                            <i class="fas fa-sliders-h text-red-600"></i> Filter & Sort
                        </h3>
                        <form method="GET" action="{{ url()->current() }}" class="space-y-6">

                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Search</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Keyword..."
                                       class="w-full border border-gray-200 rounded-lg pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition text-sm">
                                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>

                        <!-- SORT BY SECTION (Added) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">
                                <i class="fas fa-sort-amount-down text-gray-400 mr-1"></i> Sort By
                            </label>
                            <select name="sort_by"
                                    class="w-full border border-gray-200 rounded-lg px-4 py-2.5">
                                <option value="date_desc" {{ request('sort_by')=='date_desc'?'selected':'' }}>Date (Newest)</option>
                                <option value="date_asc" {{ request('sort_by')=='date_asc'?'selected':'' }}>Date (Oldest)</option>
                                <option value="title_asc" {{ request('sort_by')=='title_asc'?'selected':'' }}>Title (A-Z)</option>
                                <option value="title_desc" {{ request('sort_by')=='title_desc'?'selected':'' }}>Title (Z-A)</option>
                            </select>
                        </div>

                        <!-- Category Filter (Kept for context) -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-2">Language</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="language" value="H" {{ request('language')=='H'?'checked':'' }}>
                                        Hindi
                                    </label>
                                    <label class="flex items-center gap-2">
                                        <input type="radio" name="language" value="E" {{ request('language')=='E'?'checked':'' }}>
                                        English
                                    </label>
                                </div>
                            </div>

                        <!-- Language Filter (Kept for context) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-2">Language</label>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-red-600 rounded border-gray-300 focus:ring-red-500">
                                    <span class="text-sm text-gray-700">Hindi (H)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-red-600 rounded border-gray-300 focus:ring-red-500">
                                    <span class="text-sm text-gray-700">English (E)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2 pt-2">
                            <button class="flex-1 bg-gradient-to-r from-red-600 to-red-500 text-white py-2.5 rounded-lg font-semibold hover:from-red-700 hover:to-red-600 transition shadow-md">
                                Apply
                            </button>
                            <button class="px-4 border border-gray-300 text-gray-600 py-2.5 rounded-lg hover:bg-gray-50 transition">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1">
                <div class="glass rounded-2xl shadow-xl overflow-hidden">
                    <!-- Tabs Header -->
                    <div class="bg-gradient-to-r from-[#d10e31]/10 to-red-100/30 p-6 border-b border-[#d10e31]/20">
                        <h2 class="text-2xl font-bold text-[#495057] mb-4">{!! $category->title !!}</h2>
                        <p class="text-sm text-gray-600">{!! $category->remark !!}</p>
                    </div>

                    <!-- Tab Contents -->
                    <div class="p-6">
                        <!-- Audio Tab -->
                        <div>

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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
