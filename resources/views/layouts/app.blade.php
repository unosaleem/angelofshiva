<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Angel Of Shiva')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SEO -->
    <meta name="description" content="@yield('description','Angel of shiva website provide audios and videos')">
    <meta name="keywords" content="@yield('keywords','Angel of Shiva, Brahmakumaries, Dr Sachin Bhai, Sachin Bhai')">
    <meta name="author" content="digitalnawab.com|@unosaleem">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
    <!-- CDN Vite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow {
            animation: spinSlow 8s linear infinite;
        }

    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<x-navbar />

<main class="min-h-screen mt-16 ">
    @yield('content')

</main>
<!-- Bottom Audio Player (Pure JavaScript - all Tailwind) -->
<!-- Bottom Audio Player (Premium Animated Version) -->
<div id="fixedPlayer"
     class="fixed left-0 right-0 bottom-0 bg-white/80 backdrop-blur-xl border-t border-orange-200 shadow-2xl z-50 transform translate-y-full transition-all duration-500 ease-out">

    <!-- Top Glow Line -->
    <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-orange-500 via-orange-400 to-orange-500 animate-pulse"></div>

    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex flex-col md:flex-row items-center gap-4">

            <!-- SONG INFO -->
            <div class="flex items-center gap-3 flex-1 min-w-0">

                <div class="relative w-14 h-14 flex-shrink-0 group">

                    <!-- Rotating ring animation -->
                    <div class="absolute inset-0 rounded-lg border-2 border-orange-400 opacity-40 animate-spin-slow"></div>

                    <img id="playerCover"
                         class="w-full h-full rounded-lg object-cover shadow-lg transition-transform duration-500 group-hover:scale-105"
                         alt="Cover"/>

                    <span id="audioLiveBadge"
                          class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-[8px] font-bold px-2 py-[2px] rounded-full animate-pulse shadow">
                        <i class="fas fa-circle text-[5px] mr-1"></i> LIVE
                    </span>
                </div>

                <div class="min-w-0 flex-1">
                    <h3 class="text-sm font-extrabold text-gray-800 truncate"
                        id="audioPlayerSongTitle">
                        Space Within Sound - An Experience
                    </h3>
                    <p class="text-xs text-gray-500 truncate"
                       id="audioPlayerMeta">
                        Dr. Sachin Bhai • Madhuban Bhattis
                    </p>
                </div>
            </div>

            <!-- CONTROLS -->
            <div class="flex flex-col items-center flex-1 max-w-xl w-full">

                <div class="flex items-center gap-3 mb-1">

                    <button id="playerShuffle"
                            class="w-8 h-8 text-gray-400 hover:text-orange-600 transition duration-300 hover:scale-110">
                        <i class="fas fa-random"></i>
                    </button>

                    <button id="playerPrev"
                            class="w-9 h-9 bg-white hover:bg-orange-500 hover:text-white text-orange-500 rounded-full flex items-center justify-center transition-all duration-300 shadow hover:scale-110">
                        <i class="fas fa-backward"></i>
                    </button>

                    <button id="playerPlay"
                            class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-400 text-white rounded-full flex items-center justify-center shadow-xl text-xl transition-all duration-300 hover:scale-110 active:scale-95">
                        <i class="fas fa-play transition-transform duration-300"></i>
                    </button>

                    <button id="playerNext"
                            class="w-9 h-9 bg-white hover:bg-orange-500 hover:text-white text-orange-500 rounded-full flex items-center justify-center transition-all duration-300 shadow hover:scale-110">
                        <i class="fas fa-forward"></i>
                    </button>

                    <button id="playerRepeat"
                            class="w-8 h-8 text-gray-400 hover:text-orange-600 transition duration-300 hover:scale-110">
                        <i class="fas fa-redo"></i>
                    </button>

                </div>

                <!-- PROGRESS -->
                <div class="w-full flex items-center gap-2">
                    <span id="audioCurrentTime"
                          class="text-xs font-semibold text-gray-500 w-12 text-right">
                        00:00
                    </span>

                    <div id="audioProgressBar"
                         class="flex-1 h-2 bg-orange-100 rounded-full relative overflow-hidden cursor-pointer group">

                        <div id="audioBufferedBar"
                             class="absolute h-full bg-orange-200 rounded-full transition-all duration-300"
                             style="width:0%"></div>

                        <div id="audioPlayedBar"
                             class="absolute h-full bg-gradient-to-r from-orange-600 to-orange-400 rounded-full transition-all duration-150"
                             style="width:0%"></div>

                        <div id="audioThumb"
                             class="absolute top-1/2 -translate-y-1/2 h-4 w-4 bg-white border-2 border-orange-500 rounded-full shadow-lg transition-all duration-150 group-hover:scale-110"
                             style="left:0%"></div>
                    </div>

                    <span id="audioDuration"
                          class="text-xs font-semibold text-gray-500 w-12">
                        00:00
                    </span>
                </div>
            </div>

            <!-- RIGHT CONTROLS -->
            <div class="flex items-center gap-3 flex-1 justify-end">

                <button class="hidden md:flex w-8 h-8 text-gray-600 hover:text-orange-600 transition hover:scale-110">
                    <i class="fas fa-heart"></i>
                </button>

                <button class="hidden md:flex w-8 h-8 text-gray-600 hover:text-orange-600 transition hover:scale-110">
                    <i class="fas fa-list"></i>
                </button>

                <div class="hidden lg:flex items-center gap-2">
                    <button id="audioMuteBtn"
                            class="w-8 h-8 text-orange-500 hover:text-orange-700 transition hover:scale-110">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <input id="audioVolume"
                           type="range"
                           min="0"
                           max="100"
                           value="70"
                           class="w-24 h-1 bg-orange-200 rounded-full cursor-pointer appearance-none">

                    <span id="audioVolumeDisplay"
                          class="text-xs font-semibold text-gray-500 w-10">
                        70%
                    </span>
                </div>

                <button id="closeAudioPlayer"
                        class="ml-2 w-8 h-8 text-gray-500 hover:text-red-600 transition hover:scale-110">
                    <i class="fas fa-times"></i>
                </button>

            </div>
        </div>
    </div>

    <audio id="bottomAudio" preload="metadata"></audio>
</div>



<script>
    document.querySelectorAll('.resource-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const title = btn.dataset.title;
            const type = btn.dataset.type;
            const content = btn.dataset.content;

            const modal = document.getElementById('resourceModal');
            const modalTitle = document.getElementById('resourceModalTitle');
            const modalBody = document.getElementById('resourceModalBody');

            modalTitle.textContent = title;
            modalBody.innerHTML = '';

            if (type === 'html') {
                modalBody.innerHTML = `<div class="text-sm text-gray-700 whitespace-pre-line">${content}</div>`;
            }

            else if (content.match(/\.(pdf)$/i)) {
                modalBody.innerHTML = `<iframe src="${content}" class="w-full h-[60vh] border rounded"></iframe>`;
            }

            else if (content.match(/\.(jpg|jpeg|png|gif|webp)$/i)) {
                modalBody.innerHTML = `<img src="${content}" class="mx-auto rounded shadow max-h-[60vh]" />`;
            }

            else if (content.match(/\.(mp3|wav|ogg)$/i)) {
                modalBody.innerHTML = `
                <audio controls class="w-full">
                    <source src="${content}">
                </audio>`;
            }

            else {
                modalBody.innerHTML = `<a href="${content}" target="_blank" class="text-blue-600 underline">Open File</a>`;
            }

            modal.classList.remove('hidden');
        });
    });

</script>
<x-resource-modal />
<script>
    // ========== SWIPER HERO ==========
    new Swiper('.mySwiper', {
        loop: true,
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        autoplay: { delay: 4000, disableOnInteraction: false },
    });

    // ========== TABS ==========
    document.querySelectorAll('.media-tab-button').forEach(function(tabBtn) {
        tabBtn.addEventListener('click', function() {
            document.querySelectorAll('.media-tab-button').forEach(b => {
                b.classList.remove('active', 'border-orange-500', 'text-orange-600');
                b.classList.add('border-transparent', 'text-gray-500');
            });
            this.classList.add('active', 'border-orange-500', 'text-orange-600');
            this.classList.remove('border-transparent', 'text-gray-500');
            const targetId = this.getAttribute('data-tab');
            document.querySelectorAll('.media-tab-content').forEach(tc => tc.classList.add('hidden'));
            document.getElementById(targetId).classList.remove('hidden');
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const audio = document.getElementById('bottomAudio');
        const player = document.getElementById('fixedPlayer');

        const playBtn = document.getElementById('playerPlay');
        const playIcon = playBtn.querySelector('i');
        const nextBtn = document.getElementById('playerNext');
        const prevBtn = document.getElementById('playerPrev');
        const shuffleBtn = document.getElementById('playerShuffle');
        const repeatBtn = document.getElementById('playerRepeat');
        const closeBtn = document.getElementById('closeAudioPlayer');

        const titleEl = document.getElementById('audioPlayerSongTitle');
        const metaEl = document.getElementById('audioPlayerMeta');
        const coverEl = document.getElementById('playerCover');

        const currentTimeEl = document.getElementById('audioCurrentTime');
        const durationEl = document.getElementById('audioDuration');
        const progressBar = document.getElementById('audioProgressBar');
        const playedBar = document.getElementById('audioPlayedBar');
        const bufferedBar = document.getElementById('audioBufferedBar');
        const thumb = document.getElementById('audioThumb');

        const volumeSlider = document.getElementById('audioVolume');
        const volumeDisplay = document.getElementById('audioVolumeDisplay');
        const muteBtn = document.getElementById('audioMuteBtn');

        let cards = [];
        let index = -1;
        let shuffle = false;
        let repeat = false;
        let isDragging = false;

        function loadCards() {
            cards = Array.from(document.querySelectorAll('.audio-card'));
        }

        function formatTime(t) {
            if (!isFinite(t)) return '00:00';
            return String(Math.floor(t / 60)).padStart(2, '0') + ':' +
                String(Math.floor(t % 60)).padStart(2, '0');
        }

        function activateCard(card) {
            cards.forEach(c => c.classList.remove('ring-2','ring-orange-400'));
            card.classList.add('ring-2','ring-orange-400');
        }

        function loadTrack(i, autoplay = true) {
            if (!cards[i]) return;

            index = i;
            const card = cards[i];

            audio.src = card.dataset.audioSrc;
            audio.load();

            titleEl.textContent = card.dataset.title || '';
            metaEl.textContent = card.dataset.meta || '';
            if (card.dataset.cover) coverEl.src = card.dataset.cover;

            player.classList.remove('translate-y-full');
            activateCard(card);

            if (autoplay) {
                audio.play().catch(() => {});
            }
        }

        /* CARD CLICK */
        document.body.addEventListener('click', function(e) {
            const btn = e.target.closest('.play-audio-btn');
            if (!btn) return;

            loadCards();
            const card = e.target.closest('.audio-card');
            loadTrack(cards.indexOf(card));
        });

        /* PLAY / PAUSE */
        playBtn.onclick = () => audio.paused ? audio.play() : audio.pause();

        audio.onplay = () => {
            playIcon.classList.replace('fa-play','fa-pause');
            coverEl.parentElement.classList.add('animate-spin-slow');
        };

        audio.onpause = () => {
            playIcon.classList.replace('fa-pause','fa-play');
            coverEl.parentElement.classList.remove('animate-spin-slow');
        };

        /* NEXT / PREV */
        nextBtn.onclick = () => {
            if (!cards.length) return;
            if (shuffle) {
                loadTrack(Math.floor(Math.random() * cards.length));
            } else {
                loadTrack((index + 1) % cards.length);
            }
        };

        prevBtn.onclick = () => {
            if (!cards.length) return;
            loadTrack((index - 1 + cards.length) % cards.length);
        };

        /* SHUFFLE */
        shuffleBtn.onclick = () => {
            shuffle = !shuffle;
            shuffleBtn.classList.toggle('text-orange-600', shuffle);
        };

        /* REPEAT */
        repeatBtn.onclick = () => {
            repeat = !repeat;
            repeatBtn.classList.toggle('text-orange-600', repeat);
            audio.loop = repeat;
        };

        /* BUFFER */
        audio.onprogress = () => {
            if (audio.buffered.length > 0) {
                const bufferedEnd = audio.buffered.end(audio.buffered.length - 1);
                const percent = (bufferedEnd / audio.duration) * 100;
                bufferedBar.style.width = percent + '%';
            }
        };

        /* TIME UPDATE */
        audio.ontimeupdate = () => {
            if (!isDragging) {
                const percent = (audio.currentTime / audio.duration) * 100;
                playedBar.style.width = percent + '%';
                thumb.style.left = percent + '%';
            }
            currentTimeEl.textContent = formatTime(audio.currentTime);
            durationEl.textContent = formatTime(audio.duration);
        };

        /* SEEK CLICK */
        progressBar.addEventListener('click', function(e) {
            const rect = progressBar.getBoundingClientRect();
            const percent = (e.clientX - rect.left) / rect.width;
            audio.currentTime = percent * audio.duration;
        });

        /* DRAG SUPPORT */
        thumb.addEventListener('mousedown', () => isDragging = true);

        document.addEventListener('mouseup', () => isDragging = false);

        document.addEventListener('mousemove', function(e) {
            if (!isDragging) return;
            const rect = progressBar.getBoundingClientRect();
            let percent = (e.clientX - rect.left) / rect.width;
            percent = Math.max(0, Math.min(1, percent));
            playedBar.style.width = (percent * 100) + '%';
            thumb.style.left = (percent * 100) + '%';
            audio.currentTime = percent * audio.duration;
        });

        /* VOLUME */
        volumeSlider.oninput = () => {
            audio.volume = volumeSlider.value / 100;
            volumeDisplay.textContent = volumeSlider.value + '%';
        };

        /* MUTE */
        muteBtn.onclick = () => {
            audio.muted = !audio.muted;
            muteBtn.innerHTML = audio.muted
                ? '<i class="fas fa-volume-mute"></i>'
                : '<i class="fas fa-volume-up"></i>';
        };

        /* AUTO NEXT */
        audio.onended = () => {
            if (!repeat) nextBtn.click();
        };

        /* CLOSE */
        closeBtn.onclick = () => {
            audio.pause();
            audio.src = '';
            player.classList.add('translate-y-full');
        };

    });
</script>





</body>
</html>
