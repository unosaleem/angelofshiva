@php
    use Illuminate\Support\Facades\Storage;
@endphp
@forelse($audiosPaginated as $dateGroup)
    <div class="mb-8 fade-in">
        <div class="flex items-center gap-3 mb-4">
            <div class="date-badge bg-gradient-to-r from-[#d10e31] to-red-700 text-white px-4 py-2 rounded-full font-semibold text-sm">
                <i class="fas fa-calendar-day mr-2"></i>
                {{ $dateGroup['date']->format('F d, Y') }}
            </div>
            <div class="flex-1 h-px bg-gradient-to-r from-[#d10e31]/50 to-transparent"></div>
            <span class="text-xs text-gray-500 font-medium">{{ $dateGroup['count'] }} Items</span>
        </div>

        <div class="grid gap-4">
            @foreach($dateGroup['items'] as $audio)
                <div class="audio-card relative overflow-hidden rounded-2xl border border-orange-100 bg-gradient-to-br from-white to-orange-50 shadow-md p-6 flex flex-col md:flex-row gap-6 audio-card"
                     data-audio-src="{{ Storage::disk('s3')->url('resources/assets/audio/'.$audio->song) }}"
                     data-title="{{ $audio->title }}"
                     data-meta="{{ $audio->speaker1?->name }} • {{ $audio->category?->category_name }}"
                     data-cover="{{ Storage::disk('s3')->url('resources/assets/audio_thumb/'.$audio->attach_pic) }}">
                    <!-- Audio Card Header -->
                    <div class="absolute top-0 left-0 right-0 h-8 bg-gradient-to-r from-gray-600 to-red-400 px-6 flex items-center justify-center z-10 rounded-t-2xl">
                                                    <span class="text-white text-xs font-bold uppercase tracking-wider w-full">
                                                        {{ $audio->category?->category_name }}
                                                        @if($audio->subcategory)
                                                            → {{ $audio->subcategory->subcategory_name }}
                                                        @endif
                                                    </span>

                        <div class="absolute top-0 right-0 bg-red-600 text-[10px] font-black px-6 py-1 h-full rounded-bl-2xl text-white flex items-center">Published : {{$audio->publish_date?->format('j M Y')}}</div>
                    </div>

                    <!-- IMAGE -->
                    <div class="pt-10 md:pt-6 flex justify-center md:justify-start">
                        <div class="relative w-32 h-32 sm:w-36 sm:h-36 flex items-center justify-center group cursor-pointer">

                            @if($audio->attach_pic)
                                <img class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                     src="{{ Storage::disk('s3')->url('resources/assets/audio_thumb/'.$audio->attach_pic) }}"
                                     alt="Audio Image">

                            @elseif($audio->subcategory?->setforall_audio)
                                <img class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                     src="{{ Storage::disk('s3')->url('resources/assets/subcategory/'.$audio->subcategory->setforall_audio) }}"
                                     alt="Subcategory Image">

                            @elseif($audio->category?->setforall_audio)
                                <img class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                     src="{{ Storage::disk('s3')->url('resources/assets/category/'.$audio->category->setforall_audio) }}"
                                     alt="Category Image">

                            @else
                                <img class="w-full h-full justify-center object-cover rounded-xl shadow-lg"
                                     src="{{ Storage::disk('s3')->url('resources/assets/category/default_front_cat.jpg') }}"
                                     alt="Default Image">
                            @endif




                            <button type="button" class=" play-audio-btn absolute inset-0 bg-gradient-to-br from-orange-500/70 to-orange-600/80 flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none" tabindex="-1">
                                <i class="fas fa-play text-3xl text-white" ></i>
                            </button>
                            <!-- Pro Access Badge -->
                            <span class="absolute top-1 right-1 bg-{!! $audio->language =="H" ? 'green' : 'red' !!}-100 border border-{!! $audio->language =="H" ? 'green' : 'red' !!}-200 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold shadow-sm"><i class="fas fa-valume text-{!! $audio->language =="H" ? 'green' : 'red' !!}-600"></i> {!! $audio->language =="H" ? 'Hindi' : 'English' !!}</span>
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
                                <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i class="fas fa-user-tie text-orange-600"></i> Speaker: <b class="text-gray-700">{{ $audio->speaker1?->name }}</b></span>
                            @endif
                            @if(!empty($audio->speaker2))
                                <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i class="fas fa-user-tie text-orange-600"></i> Speaker: <b class="text-gray-700">{{ $audio->speaker2?->name }}</b></span>
                            @endif
                            @if(!empty($audio->murli_date))
                                <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i class="fas fa-calendar-alt text-orange-600"></i> Murli: <b class="text-gray-700">{{ $audio->murli_date?->format('j M Y') }}</b></span>
                            @endif
                            @if(!empty($audio->class_date))
                                <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i class="fas fa-clock text-orange-600"></i> Class: <b class="text-gray-700">{{ $audio->class_date?->format('j M Y') }}</b></span>
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
                                <button class="info-btn bg-blue-100 hover:bg-blue-300 text-blue-800 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow" data-info-index="3">
                                    <i class="fas fa-info-circle"></i> {{ $audio->note2_label ?? 'Notes 2' }}
                                </button>
                            @endif
                            @if(!empty($audio->note3_label))
                                <button class="info-btn bg-purple-100 hover:bg-purple-300 text-purple-800 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow" data-info-index="4">
                                    <i class="fas fa-info-circle"></i> {{ $audio->note3_label ?? 'Notes 3' }}
                                </button>
                            @endif
                        </div>


                        <div class="flex flex-wrap gap-2 mt-auto">
                            <button class="play-audio-btn relative bg-gradient-to-r from-orange-600 to-orange-500 text-white px-6 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow hover:from-orange-700 hover:to-orange-600 transition"
                            >
                                <i class="fas fa-play"></i> Play Now
                            </button>
                            <button class="bg-white border-2 border-orange-200 text-orange-600 px-6 py-2 rounded-xl text-sm font-bold hover:bg-orange-50 shadow transition flex items-center gap-2">
                                <i class="fas fa-download"></i> Download
                            </button>
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
