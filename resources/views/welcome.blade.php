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
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Professional Responsive Navbar (Multi menu, pure JS, Tailwind, no custom CSS, multi-level dropdowns) -->
<nav id="mainNav" class="w-full z-50 bg-gradient-to-r from-orange-400 via-orange-500 to-orange-400 shadow-lg fixed top-0 left-0">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-3">
                <a href="/" class="flex items-center justify-center bg-white">
                    <img src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/logo2.png" class="w-full h-full object-cover rounded-full" alt="Logo" />
                </a>
                <!-- <span class="ml-2 text-lg md:text-xl font-black tracking-wide text-white">ANGEL OF SHIVA</span> -->
            </div>
            <!-- Desktop navigation -->
            <div class="hidden lg:flex items-center space-x-2">
                <a href="#" class="px-4 py-2 rounded-lg font-semibold text-white transition hover:bg-white/20">Home</a>
                <div class="relative group">
                    <button class="px-4 py-2 rounded-lg font-semibold text-white flex items-center gap-2 transition hover:bg-white/20">
                        BK Dr Sachin
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <!-- Multi-level Dropdown -->
                    <div class="absolute left-0 top-full min-w-[200px] shadow-xl rounded-lg bg-white opacity-0 invisible group-hover:opacity-100 group-hover:visible transition z-40">
                        <a href="#" class="block px-6 py-3 rounded-lg text-gray-700 hover:bg-orange-50">Morning Murlis</a>
                        <a href="#" class="block px-6 py-3 rounded-lg text-gray-700 hover:bg-orange-50">Special Bhattis</a>
                        <div class="relative group">
                            <a href="#" class="block px-6 py-3 rounded-lg text-gray-700 hover:bg-orange-50 flex items-center justify-between">
                                More
                                <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                            <!-- Nested Dropdown -->
                            <div class="absolute left-full top-0 w-52 bg-white shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">
                                <a href="#" class="block px-6 py-3 rounded-lg text-gray-700 hover:bg-orange-50">Past Retreats</a>
                                <a href="#" class="block px-6 py-3 rounded-lg text-gray-700 hover:bg-orange-50">Upcoming Events</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="px-4 py-2 rounded-lg font-semibold text-white transition hover:bg-white/20">Reading Material</a>
                <a href="#" class="px-4 py-2 rounded-lg font-semibold text-white transition hover:bg-white/20">Search</a>
            </div>
            <!-- User/Logout and hamburger for mobile -->
            <div class="flex items-center gap-2">
          <span class="hidden md:flex items-center gap-2 text-white bg-white/20 px-4 py-2 rounded-full font-semibold text-sm">
            <i class="fas fa-user-circle"></i> ANURADHA SAHU
          </span>
                <button id="mobileMenuBtn" class="lg:hidden text-white text-2xl p-2 rounded-md focus:outline-none hover:bg-white/20">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu (drawer style) -->
    <div id="mobileMenu" class="fixed top-0 left-0 right-0 bottom-0 bg-white z-40 flex flex-col transform -translate-y-full transition duration-300 ease-in-out">
        <div class="flex justify-between items-center px-6 py-4 border-b border-orange-100">
            <div class="flex items-center gap-2">
                <img src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/logo2.png" alt="Logo" class="w-8 h-8 rounded-full"/>
                <span class="font-black text-orange-600 text-lg tracking-tight">ANGEL OF SHIVA</span>
            </div>
            <button id="closeMobileMenu" class="text-2xl text-orange-600 hover:text-red-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="flex-1 flex flex-col gap-1 px-6 py-8">
            <a href="#" class="py-3 px-4 rounded-lg text-orange-700 font-bold hover:bg-orange-100">Home</a>
            <!-- Expandable Menu -->
            <div class="block">
                <button type="button" class="py-3 px-4 w-full rounded-lg font-bold flex items-center justify-between text-orange-700 hover:bg-orange-100" data-collapsible="bkdrsachin">
                    BK Dr Sachin
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div id="collapsible-bkdrsachin" class="hidden flex-col ml-4 border-l border-orange-100 pl-3">
                    <a href="#" class="block py-2 px-2 rounded-md text-gray-700 hover:bg-orange-50">Morning Murlis</a>
                    <a href="#" class="block py-2 px-2 rounded-md text-gray-700 hover:bg-orange-50">Special Bhattis</a>
                    <button type="button" class="flex items-center gap-2 py-2 px-2 rounded-md w-full text-gray-700 hover:bg-orange-50" data-collapsible="more-nested">
                        More <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div id="collapsible-more-nested" class="hidden flex-col ml-3 pl-1 border-l border-orange-50">
                        <a href="#" class="block py-2 px-2 rounded-md text-gray-600 hover:bg-orange-50">Past Retreats</a>
                        <a href="#" class="block py-2 px-2 rounded-md text-gray-600 hover:bg-orange-50">Upcoming Events</a>
                    </div>
                </div>
            </div>
            <a href="#" class="py-3 px-4 rounded-lg text-orange-700 font-bold hover:bg-orange-100">Reading Material</a>
            <a href="#" class="py-3 px-4 rounded-lg text-orange-700 font-bold hover:bg-orange-100">Search</a>
            <button class="mt-8 py-3 px-4 w-full bg-gradient-to-r from-orange-500 to-orange-400 text-white font-bold rounded-lg hover:shadow-lg">LOGOUT</button>
        </nav>
    </div>
</nav>
<div class="h-16"></div>
<!-- Notice: h-16 to offset fixed navbar -->

<!-- SWIPER HERO BANNER -->
<section class="w-full mx-auto mb-10">
    <div class="swiper mySwiper overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/banner2.png" alt="slider 1" class="w-full  object-cover"/>
            </div>
            <div class="swiper-slide">
                <img src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/banner3.png" alt="slider 2" class="w-full object-cover"/>
            </div>
            <div class="swiper-slide">
                <img src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/banner1.png" alt="slider 3" class="w-full  object-cover"/>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 flex flex-col lg:flex-row gap-6">
    <!-- LIVE Announcements (no custom CSS, all Tailwind) -->
    <aside class="w-full lg:w-1/3">
        <div class="rounded-3xl bg-white bg-opacity-80 shadow-lg p-6 sticky top-20 border border-orange-100">
            <div class="flex items-center gap-3 mb-4 pb-4 border-b border-orange-100">
                <div class="relative w-16 h-16 flex items-center justify-center">
                    <!-- Live wave ripple animation moved to body-level as per instruction -->
                    <span class="relative w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center z-10">
              <i class="fas fa-bullhorn text-white"></i>
            </span>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Live Updates</h3>
            </div>
            <div class="h-72 overflow-y-auto flex flex-col gap-2 custom-scrollbar relative">
                <!-- animated sound wave or live indicator inside -->
                <div class="absolute left-0 top-2 flex flex-col items-center z-0 h-[90%] w-4 pointer-events-none">
                    <!-- SVG moving pattern: vertical sound waves -->
                    <svg height="100%" width="16" class="block">
                        <rect x="1" width="3" height="34" rx="2" fill="#fb923c">
                            <animate attributeName="height" values="16;32;16" dur="1s" repeatCount="indefinite" />
                            <animate attributeName="y" values="0;18;0" dur="1s" repeatCount="indefinite" />
                        </rect>
                        <rect x="7" width="3" height="24" rx="2" fill="#f59e42">
                            <animate attributeName="height" values="32;16;32" dur="1.2s" repeatCount="indefinite" />
                            <animate attributeName="y" values="0;8;0" dur="1.2s" repeatCount="indefinite" />
                        </rect>
                        <rect x="13" width="3" height="20" rx="2" fill="#fb983c">
                            <animate attributeName="height" values="16;32;16" dur="0.8s" repeatCount="indefinite" />
                            <animate attributeName="y" values="0;18;0" dur="0.8s" repeatCount="indefinite" />
                        </rect>
                    </svg>
                </div>
                <div class="flex items-start gap-3 bg-orange-50 rounded-xl px-4 py-2 shadow-sm mb-1 relative z-10">
                    <i class="fas fa-circle text-orange-500 text-xs mt-1 animate-pulse"></i>
                    <span class="text-sm">Morning Murli Chunks (5 Jan 2026) are now ready for download.</span>
                </div>
                <div class="flex items-start gap-3 bg-orange-50 rounded-xl px-4 py-2 shadow-sm mb-1 relative z-10">
                    <i class="fas fa-circle text-orange-500 text-xs mt-1 animate-pulse"></i>
                    <span class="text-sm">BK Sachin Bhai class on "Space Within Sound" uploaded.</span>
                </div>
                <div class="flex items-start gap-3 bg-orange-50 rounded-xl px-4 py-2 shadow-sm mb-1 relative z-10">
                    <i class="fas fa-circle text-orange-500 text-xs mt-1 animate-pulse"></i>
                    <span class="text-sm">Stay tuned for the 5:00 AM Live Streaming Bhatti.</span>
                </div>
                <div class="flex items-start gap-3 bg-orange-50 rounded-xl px-4 py-2 shadow-sm mb-1 relative z-10">
                    <i class="fas fa-circle text-orange-500 text-xs mt-1 animate-pulse"></i>
                    <span class="text-sm">New meditation guide PDF available in Reading Material.</span>
                </div>
            </div>
        </div>
    </aside>

    <div class="w-full lg:w-2/3">
        <div class="rounded-3xl bg-white bg-opacity-80 shadow-lg p-6">
            <div class="mb-6 border-b border-orange-100 ">
                <!-- Basic Tabs System, JS controlled, no custom css -->
                <nav class="flex space-x-2" id="mediaTabs">
                    <button class="media-tab-button active py-3 px-6 border-b-2 border-orange-500 font-semibold rounded-t-xl focus:outline-none text-orange-600 transition-all flex items-center gap-2" data-tab="audioTab">
                        <i class="fas fa-headphones"></i> Audio
                    </button>
                    <button class="media-tab-button py-3 px-6 border-b-2 border-transparent text-gray-500 hover:text-orange-600 font-semibold rounded-t-xl focus:outline-none transition-all flex items-center gap-2" data-tab="videoTab">
                        <i class="fas fa-video"></i> Video
                    </button>
                    <button class="media-tab-button py-3 px-6 border-b-2 border-transparent text-gray-500 hover:text-orange-600 font-semibold rounded-t-xl focus:outline-none transition-all flex items-center gap-2" data-tab="pdfTab">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                </nav>
            </div>
            <!-- Tab Contents: Audio -->
            <div id="audioTab" class="media-tab-content space-y-4">

                <div id="audioCard1" class="relative overflow-hidden rounded-2xl border border-orange-100 bg-gradient-to-br from-white to-orange-50 shadow-md p-6 flex flex-col md:flex-row gap-6 audio-card">
                    <!-- Audio Card Header -->
                    <div class="absolute top-0 left-0 right-0 h-8 bg-gradient-to-r from-orange-500 to-red-400 px-6 flex items-center justify-center z-10 rounded-t-2xl">
                        <span class="text-white text-xs font-bold uppercase tracking-wider  w-full">Madhuban Bhattis → Prev. Years</span>
                        <div class="absolute top-0 right-0 bg-red-600 text-[10px] font-black px-6 py-1 h-full rounded-bl-2xl text-white flex items-center">Published on 5 jan 2025</div>
                    </div>

                    <div class="relative w-36 h-36 flex-shrink-0 cursor-pointer group" id="audioCardImage1" style="margin-top: 2.5rem;"> <!-- push down due to header -->
                        <!-- Ripple circles removed as per instruction -->
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop"
                             alt="Cover" class="w-full h-full object-cover rounded-xl shadow-lg"/>
                        <button type="button" class="absolute inset-0 bg-gradient-to-br from-orange-500/70 to-orange-600/80 flex items-center justify-center rounded-xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none" tabindex="-1">
                            <i class="fas fa-play text-3xl text-white" id="audioCardPlayIcon1"></i>
                        </button>
                        <!-- Pro Access Badge -->
                        <span class="absolute top-1 right-1 bg-green-100 border border-green-200 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold shadow-sm"><i class="fas fa-valume text-green-600"></i> Hindi</span>
                    </div>
                    <div class="flex-1 flex flex-col" style="margin-top: 2.5rem;">
                        <!-- Header moved to card bar above
                        <span class="text-orange-600 text-xs font-bold uppercase tracking-wider mb-1">Madhuban Bhattis → Prev. Years</span>
                        -->
                        <h2 class="text-xl font-extrabold text-gray-800 mb-1">Space Within Sound - An Experience</h2>
                        <p class="text-sm text-gray-600 mb-3">Inner Peace Inner Power Retreat 2025, Gyan Sarovar</p>
                        <div class="flex flex-wrap items-center gap-2 mb-2">
                            <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i class="fas fa-user-tie text-orange-600"></i> Speaker: <b class="text-gray-700">Dr. Sachin Bhai</b></span>
                            <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i class="fas fa-calendar-alt text-orange-600"></i> Murli: <b class="text-gray-700">5 Jan 2026</b></span>
                            <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-xs flex items-center gap-2"><i class="fas fa-clock text-orange-600"></i> Class: <b class="text-gray-700">5 Jan 2026</b></span>
                        </div>
                        <!-- INSERT_YOUR_CODE -->
                        <!-- <div class="flex flex-wrap gap-2 mb-3">

                          <button id="openResource1" class="bg-gradient-to-r from-indigo-300 to-purple-300 hover:from-purple-400 hover:to-indigo-400 text-white px-3 py-1 rounded-xl text-xs font-bold shadow-lg flex items-center gap-2 transition-all duration-200 focus:outline-none">
                            <i class="fas fa-folder-open"></i>
                            Resource 1
                          </button>

                          <button id="openResource2" class="bg-gradient-to-r from-green-300 to-blue-300 hover:from-blue-400 hover:to-green-400 text-white px-3 py-1 rounded-xl text-xs font-bold shadow-lg flex items-center gap-2 transition-all duration-200 focus:outline-none">
                            <i class="fas fa-book"></i>
                            Resource 2
                          </button>
                        </div> -->
                        <!-- Info Buttons -->
                        <div class="flex flex-wrap gap-2 mb-2">
                            <button id="openResource1" class="bg-gradient-to-r from-indigo-300 to-purple-300 hover:from-purple-400 hover:to-indigo-400 text-white px-3 py-1 rounded-xl text-xs font-bold shadow-lg flex items-center gap-2 transition-all duration-200 focus:outline-none">
                                <i class="fas fa-folder-open"></i>
                                Resource 1
                            </button>
                            <!-- Resource 2 Button (Image or PDF, can be different type) -->
                            <button id="openResource2" class="bg-gradient-to-r from-green-300 to-blue-300 hover:from-blue-400 hover:to-green-400 text-white px-3 py-1 rounded-xl text-xs font-bold shadow-lg flex items-center gap-2 transition-all duration-200 focus:outline-none">
                                <i class="fas fa-book"></i>
                                Resource 2
                            </button>
                            <button class="info-btn bg-orange-200 hover:bg-orange-400 text-orange-900 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow" data-info-index="1">
                                <i class="fas fa-info-circle"></i> Info 1
                            </button>
                            <button class="info-btn bg-green-100 hover:bg-green-300 text-green-800 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow" data-info-index="2">
                                <i class="fas fa-info-circle"></i> Info 2
                            </button>
                            <button class="info-btn bg-blue-100 hover:bg-blue-300 text-blue-800 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow" data-info-index="3">
                                <i class="fas fa-info-circle"></i> Info 3
                            </button>
                            <button class="info-btn bg-purple-100 hover:bg-purple-300 text-purple-800 font-bold px-3 py-1 rounded-xl text-xs flex items-center gap-2 shadow" data-info-index="4">
                                <i class="fas fa-info-circle"></i> Info 4
                            </button>
                        </div>

                        <!-- Resource 1 Modal: Shows PDF or Image -->
                        <div id="resource1Modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 transition-all duration-200 hidden">
                            <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-0 relative overflow-hidden mx-2">
                                <button class="absolute top-2.5 right-3 text-xl text-white hover:text-red-500 focus:outline-none close-resource-modal">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h3 class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-2 flex text-lg text-orange-500 items-center justify-center z-10 rounded-t-2xl">
                                    <i class="fas fa-folder-open mr-2"></i> Resource 1
                                </h3>
                                <!-- Example Resource: PDF View -->
                                <!-- You may conditionally render image or PDF as per content -->
                                <div class="mb-4 p-4">
                                    <iframe src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" class="w-full h-72 rounded-xl border shadow" frameborder="0"></iframe>
                                </div>
                                <div class="flex justify-end p-4">
                                    <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" download class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition flex items-center gap-2">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Resource 2 Modal: Shows Image -->
                        <div id="resource2Modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 transition-all duration-200 hidden">
                            <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6 relative mx-2">
                                <button class="absolute top-2.5 right-3 text-xl text-white hover:text-red-500 focus:outline-none close-resource-modal">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h3 class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-2 flex text-lg text-orange-500 items-center justify-center z-10 rounded-t-2xl">
                                    <i class="fas fa-folder-open mr-2"></i> Resource 2
                                </h3>
                                <!-- Example Resource: Image View -->
                                <div class="w-full flex justify-center mb-4">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop" alt="Resource 2" class="rounded-xl shadow border border-blue-200 max-h-52 object-contain"/>
                                </div>
                                <div class="flex justify-end">
                                    <a href="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop" download class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-2">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Info Modal (reused for all buttons) -->
                        <div id="infoModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 transition-all duration-200 hidden">
                            <div class="bg-white rounded-2xl shadow-2xl max-w-xl w-full  relative mx-2">
                                <button class="absolute top-3 right-3 text-xl text-orange-600 hover:text-red-500 focus:outline-none" id="closeInfoModal">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h3 id="infoModalTitle" class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-2 flex text-lg text-orange-500 items-center justify-center z-10 rounded-t-2xl">
                                    <i class="fas fa-info-circle mr-2"></i> Info
                                </h3>
                                <div id="infoModalContent" class="text-sm text-gray-700 mb-5 whitespace-pre-line p-4"></div>
                                <div class="flex gap-3 justify-end p-4">
                                    <button id="copyInfoText" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 font-semibold transition">
                                        <i class="fas fa-copy"></i> Copy
                                    </button>
                                    <button id="infoDownloadPdf" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 font-semibold transition">
                                        <i class="fas fa-file-pdf"></i> Download PDF
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--
                          To support Hindi and other languages in PDF download,
                          we use jsPDF with custom font support.
                          NotoSansDevanagari font (from Google, open source) is inlined as base64 for full Unicode support.
                          This enables Hindi, Sanskrit, and most world languages to be rendered correctly in PDF.
                        -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
                        <!-- NotoSansDevanagari-Regular TTF as base64 (truncated for sample, use full for production) -->
                        <script>
                            // The base64 below is a truncated/partial NotoSansDevanagari-Regular .ttf. Replace with full base64 string for production uses!
                            // For full multi-language, use a suitable font for the language/script you need.
                            // Full font: https://github.com/googlefonts/noto-fonts/blob/main/hinted/ttf/NotoSansDevanagari/NotoSansDevanagari-Regular.ttf
                            const NOTO_DEVANAGARI_BASE64 =
                                "AAEAAAAPAIAAAwBwR0RFRt84PpAAAGgYAAAHEEdQT1Ox5nJvAAAKHAAAAexHU1VCwAAAAAAABwAAAAJGdhc3AABAAEAABkAAAAFGdseWYAAQAAAF8AAABUZ2x5ZgAAAFwAAAAsGGRtbHgAAABgAAAAGGhlYWQA0ADAALAAAAAwaGhlYQAAADAAAAAoaG10eAABAAwAAFkAAAAIbG9jYQBgABwAZgAAABhtYXhwAAgAGAAGAAAAGG5hbWUABgANAAgAAAAOcG9zdAAABAcAABwAAAJscHJlcAAEAAgABgAAAAgAAgAYAAcACAAAAAEAAAAAAAEAAwAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAD//wADAAEAAAAAAAAAAAAAAAMAAQAAABAAAwABAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEAAwABAAgAAAAAAAAAAAAAAAAAAAD//wABAAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAAAABAACAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEgwAAAAAAAi8AMgAAAAAAIAAAACAAAAAgAAAAIAAAACAAAAAgAAAAIAAAACIAAAAgAAAAA=";

                            // Register custom font to jsPDF for all Unicode Devanagari (Hindi), fallback works for any Unicode language covered by font
                            window.addEventListener('DOMContentLoaded', function () {
                                if (!window.jspdf || typeof window.jspdf.jsPDF !== "function") return;

                                const { jsPDF } = window.jspdf;

                                if (!jsPDF.API.events || !jsPDF.API.events.initializedUnicodeFont) {
                                    // Add font only once
                                    jsPDF.API.events = jsPDF.API.events || {};
                                    jsPDF.API.events.initializedUnicodeFont = true;

                                    // Add the (truncated) NotoSansDevanagari font; for full support, use the complete base64-encoded TTF string.
                                    jsPDF.API.addFileToVFS("NotoSansDevanagari-Regular.ttf", NOTO_DEVANAGARI_BASE64);
                                    jsPDF.API.addFont("NotoSansDevanagari-Regular.ttf", "NotoSansDevanagari", "normal");
                                }
                            });
                        </script>
                        <script>
                            // Resource Modal Logic
                            document.getElementById('openResource1').onclick = function() {
                                document.getElementById('resource1Modal').classList.remove('hidden');
                            };
                            document.getElementById('openResource2').onclick = function() {
                                document.getElementById('resource2Modal').classList.remove('hidden');
                            };
                            document.querySelectorAll('.close-resource-modal').forEach(btn => {
                                btn.onclick = function() {
                                    document.getElementById('resource1Modal').classList.add('hidden');
                                    document.getElementById('resource2Modal').classList.add('hidden');
                                }
                            });
                            // Close resource modal on bg click
                            ['resource1Modal', 'resource2Modal'].forEach(function(id) {
                                document.getElementById(id).addEventListener('click', function(e) {
                                    if (e.target === this) this.classList.add('hidden');
                                });
                            });

                            // Info button static info contents (replace as needed)
                            const infoData = [
                                {
                                    title: "Info 1",
                                    content: `◆━━🧘🧘💯🧘🧘━━◆

*7 Days English Series*
   _(25  to 31 Dec'25)_

*The Karmateet Countdown :*
       *Closing the account*

◆━━🧘🧘💯🧘🧘━━◆

  ⊰᯽⊱┈──╌❊╌──┈⊰᯽⊱

           *Day  6/7*
 🗓  _30 Dec 2025_

🎙 BK Dr Sachin Bhai

📱*Video Link  :*
https://www.youtube.com/live/O8gY8dEnXRk?si=Xi5aD4ZGSRv5mcwP

  ⊰᯽⊱┈──╌❊╌──┈⊰᯽⊱`
                                },
                                {
                                    title: "Info 2",
                                    content: `दूसरे इन्फो बटन के लिए जानकारी।
Information content for the second info popup.`
                                },
                                {
                                    title: "Info 3",
                                    content: `तीसरे बटन का कंटेंट यहाँ। Add anything you want for Info 3...`
                                },
                                {
                                    title: "Info 4",
                                    content: `Info 4 का विवरण या गहराई से कोई टेक्स्ट।`
                                }
                            ];

                            document.querySelectorAll('.info-btn').forEach(function(btn) {
                                btn.onclick = function() {
                                    const idx = parseInt(btn.getAttribute('data-info-index')) - 1;
                                    document.getElementById('infoModalTitle').innerHTML = `<i class="fas fa-info-circle"></i> ${infoData[idx].title}`;
                                    document.getElementById('infoModalContent').textContent = infoData[idx].content;
                                    document.getElementById('infoModal').classList.remove('hidden');

                                    // Attach info text for copy/pdf to modal element for reference
                                    document.getElementById('infoModal').setAttribute('data-active-text', infoData[idx].content);
                                }
                            });

                            // Copy button functionality
                            document.getElementById('copyInfoText').onclick = function() {
                                const text = document.getElementById('infoModal').getAttribute('data-active-text');
                                if (navigator && navigator.clipboard) {
                                    navigator.clipboard.writeText(text).then(()=>{
                                        document.getElementById('copyInfoText').innerHTML = '<i class="fas fa-check"></i> Copied!';
                                        setTimeout(() => {
                                            document.getElementById('copyInfoText').innerHTML = '<i class="fas fa-copy"></i> Copy';
                                        }, 900);
                                    });
                                } else {
                                    // Fallback for older browsers
                                    const textarea = document.createElement("textarea");
                                    textarea.value = text;
                                    document.body.appendChild(textarea);
                                    textarea.select();
                                    document.execCommand("copy");
                                    document.body.removeChild(textarea);
                                }
                            };

                            // PDF Download code using jsPDF with Unicode font for all languages (including Hindi)
                            document.getElementById('infoDownloadPdf').onclick = function() {
                                const { jsPDF } = window.jspdf;
                                const text = document.getElementById('infoModal').getAttribute('data-active-text');

                                // Use NotoSansDevanagari font for Hindi/Unicode coverage
                                const doc = new jsPDF({
                                    orientation: "p",
                                    unit: "mm",
                                    format: "a4"
                                });
                                doc.setFont("NotoSansDevanagari"); // Set font to Unicode-complete font
                                doc.setFontSize(14);

                                // Split text into lines that fit the width
                                let split = doc.splitTextToSize(text, 180); // 180mm for A4
                                let y = 20;
                                const lineHeight = 8;
                                split.forEach(line => {
                                    if (y > 287) { // check if page overflow (A4 bottom margin)
                                        doc.addPage();
                                        y = 20;
                                    }
                                    doc.text(line, 15, y, {renderingMode: "fill"});
                                    y += lineHeight;
                                });

                                // Save the PDF
                                doc.save("InfoContent.pdf");
                            };

                            // Info Modal close button
                            document.getElementById('closeInfoModal').onclick = function() {
                                document.getElementById('infoModal').classList.add('hidden');
                            };
                            // Also close info modal on bg click
                            document.getElementById('infoModal').addEventListener('click', function(e) {
                                if (e.target === this) this.classList.add('hidden');
                            });

                            // Close on Escape for all popups
                            document.addEventListener('keydown', function(e) {
                                if (e.key === 'Escape') {
                                    ['resource1Modal', 'resource2Modal', 'infoModal'].forEach(id => {
                                        document.getElementById(id).classList.add('hidden');
                                    });
                                }
                            });
                        </script>
                        <div class="flex flex-wrap gap-2 mt-auto">
                            <button onclick="openPlayer()" class="bg-gradient-to-r from-orange-600 to-orange-500 text-white px-6 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow hover:from-orange-700 hover:to-orange-600 transition">
                                <i class="fas fa-play"></i> Play Now
                            </button>
                            <button class="bg-white border-2 border-orange-200 text-orange-600 px-6 py-2 rounded-xl text-sm font-bold hover:bg-orange-50 shadow transition flex items-center gap-2">
                                <i class="fas fa-download"></i> Download
                            </button>
                            <!-- <button class="bg-white border-2 border-orange-200 text-orange-600 p-2 rounded-xl hover:bg-orange-50 shadow transition">
                              <i class="fas fa-file-pdf"></i>
                            </button>
                            <button class="bg-white border-2 border-orange-200 text-orange-600 p-2 rounded-xl hover:bg-orange-50 shadow transition">
                              <i class="fas fa-share-alt"></i>
                            </button>
                            <button class="bg-white border-2 border-orange-200 text-orange-600 p-2 rounded-xl hover:bg-orange-50 shadow transition">
                              <i class="fas fa-heart"></i>
                            </button> -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- Tab Contents: Video -->
            <div id="videoTab" class="media-tab-content hidden space-y-4">
                <div class="rounded-2xl border border-orange-100 bg-white shadow-lg p-4">
                    <h3 class="font-bold text-gray-800 mb-3">Spiritual Talk - Awakening Series</h3>
                    <video controls class="w-full max-h-64 rounded-xl shadow">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4"/>
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="rounded-2xl border border-orange-100 bg-white shadow-lg p-4">
                    <h3 class="font-bold text-gray-800 mb-3">Energy Healing Session</h3>
                    <video controls class="w-full max-h-64 rounded-xl shadow">
                        <source src="https://www.w3schools.com/html/movie.mp4" type="video/mp4"/>
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <!-- Tab Contents: PDF -->
            <div id="pdfTab" class="media-tab-content hidden space-y-4">
                <div class="rounded-2xl border border-orange-100 bg-white shadow-lg p-4">
                    <h3 class="font-bold text-gray-800 mb-3">Meditation Guide - Complete Edition</h3>
                    <iframe class="w-full h-72 rounded-xl border-2 border-orange-100 shadow" src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf"></iframe>
                </div>
                <div class="rounded-2xl border border-orange-100 bg-white shadow-lg p-4">
                    <h3 class="font-bold text-gray-800 mb-3">Monthly Satsang Ebook</h3>
                    <iframe class="w-full h-72 rounded-xl border-2 border-orange-100 shadow" src="https://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom Audio Player (Pure JavaScript - all Tailwind) -->
<div id="fixedPlayer" class="fixed left-0 right-0 bottom-0 bg-white/95 backdrop-blur-md border-t-2 border-orange-100 shadow-2xl z-50 transform translate-y-full transition duration-300">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex flex-col md:flex-row items-center gap-4">
            <!-- SONG INFO -->
            <div class="flex items-center gap-3 flex-1 min-w-0">
                <div class="relative w-14 h-14 flex-shrink-0">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop" class="w-full h-full rounded-lg object-cover shadow-md" alt="Cover"/>
                    <span id="audioLiveBadge" class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-[8px] font-bold px-2 py-[2px] rounded-full animate-pulse">
              <i class="fas fa-circle text-[5px] mr-1"></i> LIVE
            </span>
                </div>
                <div class="min-w-0 flex-1">
                    <h3 class="text-sm font-extrabold text-gray-800 truncate" id="audioPlayerSongTitle">Space Within Sound - An Experience</h3>
                    <p class="text-xs text-gray-500 truncate" id="audioPlayerMeta">Dr. Sachin Bhai • Madhuban Bhattis</p>
                </div>
            </div>
            <!-- CONTROLS -->
            <div class="flex flex-col items-center flex-1 max-w-xl w-full">
                <div class="flex items-center gap-2 mb-1">
                    <button type="button" id="playerShuffle" class="w-8 h-8 text-gray-400 hover:text-orange-600 flex items-center justify-center">
                        <i class="fas fa-random"></i>
                    </button>
                    <button type="button" id="playerPrev" class="w-9 h-9 bg-white hover:bg-orange-500 hover:text-white text-orange-500 rounded-full flex items-center justify-center transition shadow">
                        <i class="fas fa-backward"></i>
                    </button>
                    <button type="button" id="playerPlay" class="w-11 h-11 bg-gradient-to-r from-orange-500 to-orange-400 text-white rounded-full flex items-center justify-center shadow-lg text-xl hover:from-orange-600 hover:to-orange-500 transition">
                        <i class="fas fa-play"></i>
                    </button>
                    <button type="button" id="playerNext" class="w-9 h-9 bg-white hover:bg-orange-500 hover:text-white text-orange-500 rounded-full flex items-center justify-center transition shadow">
                        <i class="fas fa-forward"></i>
                    </button>
                    <button type="button" id="playerRepeat" class="w-8 h-8 text-gray-400 hover:text-orange-600 flex items-center justify-center">
                        <i class="fas fa-redo"></i>
                    </button>
                </div>
                <div class="w-full flex items-center gap-2">
                    <span id="audioCurrentTime" class="text-xs font-semibold text-gray-500 w-12 text-right">00:00</span>
                    <div id="audioProgressBar" class="flex-1 h-2 bg-orange-100 rounded-full relative overflow-hidden cursor-pointer">
                        <div id="audioBufferedBar" class="absolute h-full bg-orange-200 rounded-full" style="width: 80%"></div>
                        <div id="audioPlayedBar" class="absolute h-full bg-gradient-to-r from-orange-600 to-orange-400 rounded-full" style="width: 0%"></div>
                        <div id="audioThumb" class="absolute h-4 w-4 bg-white border-2 border-orange-500 rounded-full shadow-lg -mt-1 transition-all" style="left: 0%"></div>
                    </div>
                    <span id="audioDuration" class="text-xs font-semibold text-gray-500 w-12">00:00</span>
                </div>
            </div>
            <!-- RIGHT CONTROLS -->
            <div class="flex items-center gap-3 flex-1 justify-end">
                <button type="button" class="hidden md:flex items-center justify-center w-8 h-8 text-gray-600 hover:text-orange-600 transition"><i class="fas fa-heart"></i></button>
                <button type="button" class="hidden md:flex items-center justify-center w-8 h-8 text-gray-600 hover:text-orange-600 transition"><i class="fas fa-list"></i></button>
                <div class="hidden lg:flex items-center gap-2">
                    <button type="button" id="audioMuteBtn" class="w-8 h-8 text-orange-500 hover:text-orange-700 flex items-center justify-center">
                        <i class="fas fa-volume-up"></i>
                    </button>
                    <input id="audioVolume" type="range" min="0" max="100" value="70" class="w-24 h-1 bg-orange-200 rounded-full cursor-pointer appearance-none">
                    <span id="audioVolumeDisplay" class="text-xs font-semibold text-gray-500 w-10">70%</span>
                </div>
                <button type="button" id="closeAudioPlayer" class="ml-2 w-8 h-8 text-gray-500 hover:text-red-600 transition flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Audio Element: pure JS -->
    <audio id="bottomAudio" preload="metadata">
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg"/>
    </audio>
</div>

<!-- TAILWIND-ONLY SCRIPTS (No Alpine.js, all pure JS for toggles/tabs/player/menu) -->
<script>
    // ========== SWIPER HERO ==========
    new Swiper('.mySwiper', {
        loop: true,
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        autoplay: { delay: 4000, disableOnInteraction: false },
    });

    // ========== RESPONSIVE NAVBAR ==========
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMobileMenu = document.getElementById('closeMobileMenu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-y-full');
        document.body.classList.add('overflow-hidden');
    });
    closeMobileMenu.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-y-full');
        document.body.classList.remove('overflow-hidden');
    });

    // Collapsible submenus mobile
    document.querySelectorAll('[data-collapsible]').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = 'collapsible-' + btn.getAttribute('data-collapsible');
            const target = document.getElementById(targetId);
            if (target.classList.contains('hidden')) {
                target.classList.remove('hidden');
                btn.querySelector('i.fas').classList.replace('fa-chevron-down', 'fa-chevron-up');
            } else {
                target.classList.add('hidden');
                btn.querySelector('i.fas').classList.replace('fa-chevron-up', 'fa-chevron-down');
            }
        });
    });

    // Close mobile menu on ESC
    document.addEventListener('keydown', function(e) {
        if(e.key === "Escape") {
            mobileMenu.classList.add('-translate-y-full');
            document.body.classList.remove('overflow-hidden');
        }
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

    // ========== AUDIO PLAYER (Bottom Fixed) ==========
    const audioEl = document.getElementById('bottomAudio');
    const audioPlayer = document.getElementById('fixedPlayer');
    const playBtn = document.getElementById('playerPlay');
    const playIcon = playBtn.querySelector('i');
    const prevBtn = document.getElementById('playerPrev');
    const nextBtn = document.getElementById('playerNext');
    const shuffleBtn = document.getElementById('playerShuffle');
    const repeatBtn = document.getElementById('playerRepeat');
    const currentTimeEl = document.getElementById('audioCurrentTime');
    const durationEl = document.getElementById('audioDuration');
    const playedBar = document.getElementById('audioPlayedBar');
    const bufferedBar = document.getElementById('audioBufferedBar');
    const progressBar = document.getElementById('audioProgressBar');
    const thumb = document.getElementById('audioThumb');
    const muteBtn = document.getElementById('audioMuteBtn');
    const volumeSlider = document.getElementById('audioVolume');
    const volumeDisplay = document.getElementById('audioVolumeDisplay');
    const closeBtn = document.getElementById('closeAudioPlayer');
    const liveBadge = document.getElementById('audioLiveBadge');
    // --- Player related state for photo click: We'll track current card (active/deactive)
    let isPlaying = false;
    let isMuted = false;
    let repeat = false;
    let shuffle = false;
    let activeAudioCardId = null; // new variable to track active

    function formatTime(sec) {
        if (isNaN(sec) || !isFinite(sec)) return '00:00';
        const mins = Math.floor(sec / 60);
        const secs = Math.floor(sec % 60);
        return `${mins.toString().padStart(2,'0')}:${secs.toString().padStart(2,'0')}`;
    }

    function updateBars() {
        if(audioEl.duration) {
            playedBar.style.width = `${(audioEl.currentTime / audioEl.duration) * 100}%`;
            thumb.style.left = `calc(${(audioEl.currentTime / audioEl.duration) * 100}% - 8px)`;
        }
        if(audioEl.buffered.length > 0 && audioEl.duration) {
            const bufferedEnd = audioEl.buffered.end(audioEl.buffered.length - 1);
            bufferedBar.style.width = `${(bufferedEnd / audioEl.duration) * 100}%`;
        }
        currentTimeEl.textContent = formatTime(audioEl.currentTime);
        durationEl.textContent = formatTime(audioEl.duration);
    }

    playBtn.addEventListener('click', function() {
        if(audioEl.paused) {
            audioEl.play();
        } else {
            audioEl.pause();
        }
    });

    audioEl.addEventListener('play', () => {
        isPlaying = true;
        playIcon.classList.remove('fa-play');
        playIcon.classList.add('fa-pause');
        if(liveBadge) liveBadge.classList.remove('hidden');
        // Set icon on the card
        setAudioCardState(true);
    });
    audioEl.addEventListener('pause', () => {
        isPlaying = false;
        playIcon.classList.remove('fa-pause');
        playIcon.classList.add('fa-play');
        if(liveBadge) liveBadge.classList.add('hidden');
        setAudioCardState(false);
    });
    audioEl.addEventListener('timeupdate', updateBars);
    audioEl.addEventListener('loadedmetadata', updateBars);
    audioEl.addEventListener('ended', function() {
        if(repeat) {
            audioEl.currentTime = 0;
            audioEl.play();
        } else {
            isPlaying = false;
            playIcon.classList.remove('fa-pause');
            playIcon.classList.add('fa-play');
            if(liveBadge) liveBadge.classList.add('hidden');
            setAudioCardState(false);
        }
    });

    // Seek
    progressBar.addEventListener('click', function(e){
        const rect = progressBar.getBoundingClientRect();
        const percent = Math.min(Math.max((e.clientX - rect.left) / rect.width, 0), 1);
        audioEl.currentTime = percent * audioEl.duration;
    });

    // Volume
    volumeSlider.addEventListener('input', function() {
        const val = Number(this.value);
        audioEl.volume = val / 100;
        volumeDisplay.textContent = `${val}%`;
        if(val === 0) {
            muteBtn.querySelector('i').className = 'fas fa-volume-mute';
            isMuted = true;
        } else if(val < 50) {
            muteBtn.querySelector('i').className = 'fas fa-volume-down';
            isMuted = false;
        } else {
            muteBtn.querySelector('i').className = 'fas fa-volume-up';
            isMuted = false;
        }
    });
    muteBtn.addEventListener('click', function() {
        if(isMuted) {
            audioEl.muted = false;
            volumeSlider.value = audioEl.volume * 100;
            muteBtn.querySelector('i').className = (volumeSlider.value > 50) ? 'fas fa-volume-up' : 'fas fa-volume-down';
            volumeDisplay.textContent = `${volumeSlider.value}%`;
            isMuted = false;
        } else {
            audioEl.muted = true;
            muteBtn.querySelector('i').className = 'fas fa-volume-mute';
            volumeDisplay.textContent = '0%';
            isMuted = true;
        }
    });

    // Repeat & Shuffle
    repeatBtn.addEventListener('click', function() {
        repeat = !repeat;
        repeatBtn.classList.toggle('text-orange-600', repeat);
        audioEl.loop = repeat;
    });
    shuffleBtn.addEventListener('click', function() {
        shuffle = !shuffle;
        shuffleBtn.classList.toggle('text-orange-600', shuffle);
        // If playlist: shuffle logic here
    });
    // (Demo: Previous/Next buttons can be hooked to playlist logic as needed)
    prevBtn.addEventListener('click', ()=>{ audioEl.currentTime = 0; });
    nextBtn.addEventListener('click', ()=>{ audioEl.currentTime = audioEl.duration || 0; });

    // --- MAIN Custom logic to enable photo click for active/deactive player with icon change and active div
    function setAudioCardState(isActive) {
        // Only the main audio card
        const cardId = "audioCard1";
        const imgDiv = document.getElementById("audioCardImage1");
        const cardDiv = document.getElementById(cardId);
        const playIcon = document.getElementById("audioCardPlayIcon1");
        // Update card active state
        if(isActive) {
            cardDiv.classList.add("ring-4", "ring-orange-400", "bg-orange-50");
            imgDiv.classList.add("active");
            playIcon.classList.remove("fa-play");
            playIcon.classList.add("fa-pause");
        } else {
            cardDiv.classList.remove("ring-4", "ring-orange-400", "bg-orange-50");
            imgDiv.classList.remove("active");
            playIcon.classList.add("fa-play");
            playIcon.classList.remove("fa-pause");
        }
    }

    function togglePlayerFromCard() {
        // Toggle logic for image click: play if closed, pause/close if open
        if(audioPlayer.classList.contains('translate-y-full')) {
            // Show player, play audio, make card active
            audioPlayer.classList.remove('translate-y-full');
            setTimeout(()=>{ audioEl.play(); }, 100);
            setAudioCardState(true);
            activeAudioCardId = "audioCard1";
        } else {
            // If already visible and playing and this card is active, pause/hide
            if(activeAudioCardId === "audioCard1" && !audioEl.paused) {
                audioEl.pause();
                audioPlayer.classList.add('translate-y-full');
                setAudioCardState(false);
                activeAudioCardId = null;
            } else {
                // If player open from some other source, switch
                setAudioCardState(true);
                audioEl.currentTime = 0;
                audioEl.play();
                activeAudioCardId = "audioCard1";
            }
        }
    }

    // Attach click event to photo area
    document.getElementById("audioCardImage1").addEventListener("click", function(e) {
        e.preventDefault();
        togglePlayerFromCard();
    });

    // "Play Now" button uses legacy openPlayer (keep as normal play/use)
    window.openPlayer = function() {
        audioPlayer.classList.remove('translate-y-full');
        setTimeout(()=>{ audioEl.play(); }, 100);
        setAudioCardState(true);
        activeAudioCardId = "audioCard1";
    };
    closeBtn.addEventListener('click', function() {
        audioEl.pause();
        audioPlayer.classList.add('translate-y-full');
        setAudioCardState(false);
        activeAudioCardId = null;
    });

    // Initial
    durationEl.textContent = formatTime(audioEl.duration);
    // Hide player, reset card/active on load
    window.addEventListener('DOMContentLoaded', function(){
        audioPlayer.classList.add('translate-y-full');
        mobileMenu.classList.add('-translate-y-full');
        setAudioCardState(false);
        activeAudioCardId = null;
    });
    // Optional: Hide player if window resize very small
    window.addEventListener('resize', function() {
        if(window.innerWidth < 500) { audioPlayer.classList.add('rounded-t-3xl', 'shadow-xl'); }
        else { audioPlayer.classList.remove('rounded-t-3xl', 'shadow-xl'); }
    });
</script>

</body>
</html>
