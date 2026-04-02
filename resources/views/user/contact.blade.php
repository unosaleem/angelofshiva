@extends('layouts.app')

@section('content')
    <style>
    @keyframes floatUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
    }
    @keyframes wave {
    0%, 100% { transform: scale(1); opacity: 0.13; }
    50% { transform: scale(1.09); opacity: 0.23; }
    }
    @keyframes ripple {
    0% { transform: scale(0.8); opacity: 0.7; }
    100% { transform: scale(2.6); opacity: 0; }
    }
    @keyframes shimmerBtn {
    0% { background-position: 0% center; }
    100% { background-position: 200% center; }
    }
    @keyframes omFloat {
    0% { transform: translateY(0px) rotate(0deg); opacity: 0.07; }
    50% { transform: translateY(-18px) rotate(10deg); opacity: 0.13; }
    100% { transform: translateY(0px) rotate(0deg); opacity: 0.07; }
    }
    @keyframes shimmerTitle {
    0%, 100% { background-position: 0% center; }
    50% { background-position: 100% center; }
    }

    .wave1 { animation: wave 4s ease-in-out infinite; }
    .wave2 { animation: wave 4s ease-in-out infinite 1.5s; }
    .wave3 { animation: wave 4s ease-in-out infinite 3s; }
    .rip1 { animation: ripple 2.6s ease-out infinite; }
    .rip2 { animation: ripple 2.6s ease-out infinite 0.85s; }
    .rip3 { animation: ripple 2.6s ease-out infinite 1.7s; }

    .field-anim { animation: floatUp 0.6s ease forwards; opacity: 0; }
    .field-anim:nth-child(1)  { animation-delay: 0.05s; }
    .field-anim:nth-child(2)  { animation-delay: 0.10s; }
    .field-anim:nth-child(3)  { animation-delay: 0.15s; }
    .field-anim:nth-child(4)  { animation-delay: 0.20s; }
    .field-anim:nth-child(5)  { animation-delay: 0.25s; }
    .field-anim:nth-child(6)  { animation-delay: 0.30s; }
    .field-anim:nth-child(7)  { animation-delay: 0.35s; }
    .field-anim:nth-child(8)  { animation-delay: 0.40s; }
    .field-anim:nth-child(9)  { animation-delay: 0.45s; }
    .field-anim:nth-child(10) { animation-delay: 0.50s; }
    .field-anim:nth-child(11) { animation-delay: 0.55s; }
    .field-anim:nth-child(12) { animation-delay: 0.60s; }
    .field-anim:nth-child(13) { animation-delay: 0.65s; }

    .shimmer-btn {
    background-size: 200% auto;
    background-image: linear-gradient(110deg, #c2410c 0%, #ea580c 30%, #fb923c 50%, #f97316 70%, #c2410c 100%);
    animation: shimmerBtn 2s linear infinite;
    }
    .title-shimmer {
    background: linear-gradient(90deg, #c2410c, #ea580c, #fb923c, #ea580c, #c2410c);
    background-size: 300%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmerTitle 4s ease-in-out infinite;
    }
    .glass { backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); }

    input::placeholder, textarea::placeholder { color: #d97706; opacity: 0.4; }
    input:focus, select:focus, textarea:focus { outline: none; }
    select option { color: #1f2937; background: white; }
    .input-icon-wrap input,
    .input-icon-wrap textarea { padding-left: 2.6rem; }

    .error-field { border-color: #dc2626 !important; box-shadow: 0 0 0 2px rgba(220,38,38,0.15) !important; }
    .err-msg { display: none; color: #dc2626; font-size: 0.72rem; margin-top: 3px; font-family: 'Hind', sans-serif; }
    .err-msg.show { display: block; }

    /* Custom Radio */
    .radio-opt { display: flex; align-items: center; gap: 8px; cursor: pointer; margin-bottom: 6px; }
    .radio-opt input[type="radio"] { display: none; }
    .radio-dot {
    width: 17px; height: 17px; border-radius: 50%;
    border: 2px solid #f97316; position: relative; flex-shrink: 0;
    transition: border-color 0.2s, box-shadow 0.2s;
    }
    .radio-opt input:checked + .radio-dot { border-color: #c2410c; box-shadow: 0 0 0 3px rgba(194,65,12,0.15); }
    .radio-dot::after {
    content: ''; position: absolute; top: 50%; left: 50%;
    transform: translate(-50%,-50%) scale(0);
    width: 7px; height: 7px; border-radius: 50%; background: #c2410c;
    transition: transform 0.22s cubic-bezier(0.34,1.56,0.64,1);
    }
    .radio-opt input:checked + .radio-dot::after { transform: translate(-50%,-50%) scale(1); }
    .radio-opt span { font-size: 0.92rem; color: #7c2d12; font-family: 'Hind', sans-serif; }

    /* Om floating */
    .om-el {
    position: absolute; font-family: 'Baloo 2', cursive; color: rgba(194,65,12,0.09);
    user-select: none; pointer-events: none; animation: omFloat ease-in-out infinite;
    }

    /* Captcha mock */
    .captcha-box { transition: background 0.25s, border-color 0.25s; }
    .captcha-box.ticked { background: #c2410c; border-color: #c2410c; }

    @media (max-width: 640px) {
    .form-2col { grid-template-columns: 1fr !important; }
    }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-red-50 py-8 px-4 sm:px-6 lg:px-8">

        <div class="max-w-6xl mx-auto">
    <!-- ═══ ENERGY WAVE BACKGROUND ═══ -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none" style="z-index:0;">
        <!-- Pulsating blob circles -->
        <div class="wave1 absolute rounded-full" style="width:720px;height:720px;top:-220px;left:-220px;background:radial-gradient(circle, rgba(234,88,12,0.17) 0%, rgba(251,146,60,0.07) 60%, transparent 80%);"></div>
        <div class="wave2 absolute rounded-full" style="width:580px;height:580px;bottom:-160px;right:-160px;background:radial-gradient(circle, rgba(194,65,12,0.14) 0%, rgba(249,115,22,0.06) 60%, transparent 80%);"></div>
        <div class="wave3 absolute rounded-full" style="width:380px;height:380px;top:35%;left:55%;background:radial-gradient(circle, rgba(251,146,60,0.11) 0%, transparent 70%);"></div>

        <!-- Ripple energy — bottom left -->
        <div class="rip1 absolute rounded-full border-2" style="width:240px;height:240px;bottom:50px;left:50px;border-color:rgba(234,88,12,0.38);"></div>
        <div class="rip2 absolute rounded-full border-2" style="width:240px;height:240px;bottom:50px;left:50px;border-color:rgba(249,115,22,0.26);"></div>
        <div class="rip3 absolute rounded-full border-2" style="width:240px;height:240px;bottom:50px;left:50px;border-color:rgba(251,146,60,0.16);"></div>

        <!-- Ripple energy — top right -->
        <div class="rip1 absolute rounded-full border" style="width:190px;height:190px;top:35px;right:70px;border-color:rgba(194,65,12,0.32);animation-delay:0.45s;"></div>
        <div class="rip2 absolute rounded-full border" style="width:190px;height:190px;top:35px;right:70px;border-color:rgba(234,88,12,0.22);animation-delay:1.3s;"></div>
        <div class="rip3 absolute rounded-full border" style="width:190px;height:190px;top:35px;right:70px;border-color:rgba(249,115,22,0.13);animation-delay:2.1s;"></div>

        <!-- Floating dots -->
        <div class="wave1 absolute rounded-full" style="width:18px;height:18px;top:22%;left:14%;background:rgba(234,88,12,0.32);"></div>
        <div class="wave2 absolute rounded-full" style="width:11px;height:11px;top:58%;left:7%;background:rgba(249,115,22,0.28);"></div>
        <div class="wave3 absolute rounded-full" style="width:23px;height:23px;top:78%;left:28%;background:rgba(251,146,60,0.22);"></div>
        <div class="wave1 absolute rounded-full" style="width:15px;height:15px;top:32%;right:11%;background:rgba(194,65,12,0.28);animation-delay:2s;"></div>
        <div class="wave2 absolute rounded-full" style="width:9px;height:9px;top:66%;right:19%;background:rgba(234,88,12,0.32);animation-delay:0.6s;"></div>
        <div class="wave3 absolute rounded-full" style="width:27px;height:27px;top:11%;right:38%;background:rgba(249,115,22,0.18);animation-delay:1s;"></div>

        <!-- Floating Om symbols -->
        <span class="om-el text-6xl" style="top:10%;left:5%;animation-duration:7s;">ॐ</span>
        <span class="om-el text-4xl" style="top:65%;left:3%;animation-duration:9s;animation-delay:2s;">🔱</span>
        <span class="om-el text-5xl" style="top:20%;right:4%;animation-duration:8s;animation-delay:1s;">ॐ</span>
        <span class="om-el text-3xl" style="top:80%;right:6%;animation-duration:6s;animation-delay:3s;">✦</span>
        <span class="om-el text-4xl" style="top:50%;left:48%;animation-duration:10s;animation-delay:0.5s;">ॐ</span>
    </div>

    <!-- ═══ MAIN CARD ═══ -->
    <div class="relative w-full " style="z-index:2;">
        <div class="glass rounded-3xl overflow-hidden border border-orange-200"
             style="background:rgba(255,255,255,0.88);box-shadow:0 25px 80px rgba(194,65,12,0.18),0 4px 20px rgba(234,88,12,0.1);">

            <!-- ── Header Banner ── -->
            <div class="relative overflow-hidden px-8 py-8 text-center"
                 style="background:linear-gradient(135deg, #c2410c 0%, #ea580c 40%, #f97316 70%, #fb923c 100%);">
                <!-- Decorative circles in banner -->
                <div class="absolute -top-8 -left-8 w-36 h-36 rounded-full" style="background:rgba(255,255,255,0.07);"></div>
                <div class="absolute -bottom-12 -right-12 w-44 h-44 rounded-full" style="background:rgba(255,255,255,0.05);"></div>
                <div class="absolute top-3 right-24 w-14 h-14 rounded-full" style="background:rgba(255,255,255,0.09);"></div>
                <div class="absolute bottom-2 left-20 w-10 h-10 rounded-full" style="background:rgba(255,255,255,0.08);"></div>
                <div class="relative">
                    <div class="flex items-center justify-center gap-3 mb-1">
                        <div class="h-px w-12" style="background:rgba(255,255,255,0.35);"></div>
                        <span class="text-2xl">🙏</span>
                        <div class="h-px w-12" style="background:rgba(255,255,255,0.35);"></div>
                    </div>
                    <div class="text-xs font-semibold tracking-widest uppercase mb-2" style="color:rgba(255,237,213,0.75);letter-spacing:0.28em;font-family:'Baloo 2',cursive;">
                        Angel of Shiva · Brahma Kumaris
                    </div>
                    <h1 class="text-4xl font-extrabold text-white mb-1" style="font-family:'Baloo 2',cursive;text-shadow:0 2px 14px rgba(0,0,0,0.2);">
                        संपर्क करें
                    </h1>
                    <p class="text-sm font-medium tracking-widest" style="color:rgba(255,237,213,0.85);letter-spacing:0.22em;font-family:'Baloo 2',cursive;">
                        ✦ Contact Us ✦
                    </p>
                    <div class="mt-3 inline-block border border-orange-200 border-opacity-40 rounded-full px-5 py-1 text-xs tracking-widest"
                         style="color:rgba(255,237,213,0.8);font-family:'Hind',sans-serif;background:rgba(255,255,255,0.08);">
                        🔒 Your Information Will Be Kept Confidential
                    </div>
                </div>
            </div>

            <!-- ── Form Body ── -->
            <div class="px-6 sm:px-8 py-8">
                <form id="contactForm" novalidate>
                    <div class="space-y-0">

                        <!-- ─ SECTION: Personal Info ─ -->
                        <div class="field-anim flex items-center gap-3 mb-5">
                            <div class="flex-1 h-px" style="background:linear-gradient(90deg,transparent,#f97316,transparent);"></div>
                            <span class="text-xs font-bold tracking-widest uppercase flex items-center gap-1.5 whitespace-nowrap" style="color:#ea580c;font-family:'Baloo 2',cursive;">
                🪷 व्यक्तिगत जानकारी <span class="font-normal text-orange-300">| Personal Details</span>
              </span>
                            <div class="flex-1 h-px" style="background:linear-gradient(90deg,transparent,#f97316,transparent);"></div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4 form-2col">

                            <!-- Name -->
                            <div class="field-anim">
                                <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">पूरा नाम <span class="text-orange-500">★</span></label>
                                <div class="input-icon-wrap relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-400 text-sm">👤</span>
                                    <input type="text" id="name" placeholder="Enter your full name"
                                           class="w-full py-2.5 pr-4 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-800 text-sm font-medium transition-all duration-200 focus:border-orange-400 focus:bg-white focus:shadow-lg"
                                           style="font-family:'Hind',sans-serif;">
                                </div>
                                <div class="err-msg" id="nameErr">⚠ Please enter your name</div>
                            </div>

                            <!-- Email -->
                            <div class="field-anim">
                                <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">ईमेल पता <span class="text-orange-500">★</span></label>
                                <div class="input-icon-wrap relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-400 text-sm">✉</span>
                                    <input type="email" id="email" placeholder="your@email.com"
                                           class="w-full py-2.5 pr-4 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-800 text-sm font-medium transition-all duration-200 focus:border-orange-400 focus:bg-white focus:shadow-lg"
                                           style="font-family:'Hind',sans-serif;">
                                </div>
                                <div class="err-msg" id="emailErr">⚠ Please enter a valid email</div>
                            </div>

                            <!-- Country Code + Mobile -->
                            <div class="field-anim">
                                <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">मोबाइल नंबर</label>
                                <div class="flex gap-2">
                                    <input type="text" value="+91" maxlength="5"
                                           class="w-16 px-2 py-2.5 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-700 text-sm font-medium text-center focus:border-orange-400 focus:bg-white transition-all"
                                           style="font-family:'Hind',sans-serif;">
                                    <div class="input-icon-wrap relative flex-1">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-400 text-sm">📱</span>
                                        <input type="tel" id="mobile" placeholder="10 digit mobile no." maxlength="10"
                                               class="w-full py-2.5 pr-3 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-800 text-sm font-medium transition-all duration-200 focus:border-orange-400 focus:bg-white"
                                               style="font-family:'Hind',sans-serif;padding-left:2.4rem;">
                                    </div>
                                </div>
                                <div class="err-msg" id="mobileErr">⚠ Enter a valid 10-digit number</div>
                            </div>

                            <!-- Center Name -->
                            <div class="field-anim">
                                <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">सेंटर का नाम</label>
                                <div class="input-icon-wrap relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-400 text-sm">🏛</span>
                                    <input type="text" id="center" placeholder="Enter Center Name"
                                           class="w-full py-2.5 pr-4 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-800 text-sm font-medium transition-all duration-200 focus:border-orange-400 focus:bg-white"
                                           style="font-family:'Hind',sans-serif;">
                                </div>
                            </div>

                            <!-- City -->
                            <div class="field-anim">
                                <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">शहर <span class="text-orange-500">★</span></label>
                                <div class="input-icon-wrap relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-400 text-sm">🏙</span>
                                    <input type="text" id="city" placeholder="Enter your city"
                                           class="w-full py-2.5 pr-4 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-800 text-sm font-medium transition-all duration-200 focus:border-orange-400 focus:bg-white"
                                           style="font-family:'Hind',sans-serif;">
                                </div>
                                <div class="err-msg" id="cityErr">⚠ Please enter your city</div>
                            </div>

                            <!-- Year in Gyan -->
                            <div class="field-anim">
                                <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">ज्ञान में वर्ष <span class="text-orange-500">★</span></label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-400 text-sm z-10">📖</span>
                                    <select id="gyan"
                                            class="w-full pl-9 pr-8 py-2.5 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-700 text-sm font-medium transition-all duration-200 focus:border-orange-400 focus:bg-white cursor-pointer appearance-none"
                                            style="font-family:'Hind',sans-serif;">
                                        <option value="">Select gyan year</option>
                                        <option>Less than 1 year</option>
                                        <option>1 - 3 years</option>
                                        <option>3 - 7 years</option>
                                        <option>7 - 15 years</option>
                                        <option>More than 15 years</option>
                                    </select>
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-orange-400 pointer-events-none text-xs">▼</span>
                                </div>
                                <div class="err-msg" id="gyanErr">⚠ Please select year in gyan</div>
                            </div>
                        </div>

                        <!-- ─ SECTION: Preferences ─ -->
                        <div class="field-anim flex items-center gap-3 mt-2 mb-5">
                            <div class="flex-1 h-px" style="background:linear-gradient(90deg,transparent,#f97316,transparent);"></div>
                            <span class="text-xs font-bold tracking-widest uppercase flex items-center gap-1.5 whitespace-nowrap" style="color:#ea580c;font-family:'Baloo 2',cursive;">
                ⚙️ प्राथमिकताएं <span class="font-normal text-orange-300">| Preferences</span>
              </span>
                            <div class="flex-1 h-px" style="background:linear-gradient(90deg,transparent,#f97316,transparent);"></div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4 form-2col">

                            <!-- Gender -->
                            <div class="field-anim rounded-2xl p-4 border-2 border-orange-100 bg-orange-50">
                                <label class="block text-xs font-bold mb-3 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">लिंग <span class="text-orange-500">★</span></label>
                                <label class="radio-opt"><input type="radio" name="gender" value="Male"><div class="radio-dot"></div><span>Male — पुरुष</span></label>
                                <label class="radio-opt"><input type="radio" name="gender" value="Female"><div class="radio-dot"></div><span>Female — महिला</span></label>
                                <label class="radio-opt mb-0"><input type="radio" name="gender" value="Other"><div class="radio-dot"></div><span>Other — अन्य</span></label>
                                <div class="err-msg" id="genderErr">⚠ Please select gender</div>
                            </div>

                            <!-- Murli Daily -->
                            <div class="field-anim rounded-2xl p-4 border-2 border-orange-100 bg-orange-50">
                                <label class="block text-xs font-bold mb-3 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">क्या आप रोज़ मुरली पढ़ते हैं? <span class="text-orange-500">★</span></label>
                                <label class="radio-opt"><input type="radio" name="murli" value="Yes"><div class="radio-dot"></div><span>Yes — हाँ</span></label>
                                <label class="radio-opt"><input type="radio" name="murli" value="No"><div class="radio-dot"></div><span>No — नहीं</span></label>
                                <label class="radio-opt mb-0"><input type="radio" name="murli" value="Sometimes"><div class="radio-dot"></div><span>Sometimes — कभी-कभी</span></label>
                                <div class="err-msg" id="murliErr">⚠ Please select an option</div>
                            </div>

                            <!-- You want to -->
                            <div class="field-anim rounded-2xl p-4 border-2 border-orange-100 bg-orange-50">
                                <label class="block text-xs font-bold mb-3 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">आप क्या चाहते हैं? <span class="text-orange-500">★</span></label>
                                <label class="radio-opt"><input type="radio" name="want" value="General Query"><div class="radio-dot"></div><span>General Query</span></label>
                                <label class="radio-opt"><input type="radio" name="want" value="Suggestion"><div class="radio-dot"></div><span>Give suggestion / feedback</span></label>
                                <label class="radio-opt"><input type="radio" name="want" value="Tech Support"><div class="radio-dot"></div><span>Tech. support for website</span></label>
                                <label class="radio-opt mb-0"><input type="radio" name="want" value="Donate"><div class="radio-dot"></div><span>Donate for AoS maintenance</span></label>
                                <div class="err-msg" id="wantErr">⚠ Please select a purpose</div>
                            </div>

                            <!-- Response in -->
                            <div class="field-anim rounded-2xl p-4 border-2 border-orange-100 bg-orange-50">
                                <label class="block text-xs font-bold mb-3 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">उत्तर किस भाषा में चाहिए? <span class="text-orange-500">★</span></label>
                                <label class="radio-opt"><input type="radio" name="lang" value="Hindi"><div class="radio-dot"></div><span>हिंदी — Hindi</span></label>
                                <label class="radio-opt mb-0"><input type="radio" name="lang" value="English"><div class="radio-dot"></div><span>English — अंग्रेज़ी</span></label>
                                <div class="err-msg" id="langErr">⚠ Please select a language</div>
                            </div>
                        </div>

                        <!-- ─ SECTION: Message ─ -->
                        <div class="field-anim flex items-center gap-3 mt-2 mb-5">
                            <div class="flex-1 h-px" style="background:linear-gradient(90deg,transparent,#f97316,transparent);"></div>
                            <span class="text-xs font-bold tracking-widest uppercase flex items-center gap-1.5 whitespace-nowrap" style="color:#ea580c;font-family:'Baloo 2',cursive;">
                💬 संदेश <span class="font-normal text-orange-300">| Message</span>
              </span>
                            <div class="flex-1 h-px" style="background:linear-gradient(90deg,transparent,#f97316,transparent);"></div>
                        </div>

                        <!-- Message Textarea -->
                        <div class="field-anim mb-4">
                            <label class="block text-xs font-semibold mb-1.5 tracking-wide" style="color:#9a3412;font-family:'Baloo 2',cursive;">आपका संदेश <span class="text-orange-500">★</span></label>
                            <div class="input-icon-wrap relative">
                                <span class="absolute left-3 top-3.5 text-orange-400 text-sm">✏</span>
                                <textarea id="message" rows="4" placeholder="Enter your message here..."
                                          class="w-full py-3 pr-4 rounded-xl border-2 border-orange-100 bg-orange-50 text-gray-800 text-sm font-medium transition-all duration-200 focus:border-orange-400 focus:bg-white resize-none"
                                          style="font-family:'Hind',sans-serif;padding-left:2.4rem;"></textarea>
                            </div>
                            <div class="err-msg" id="msgErr">⚠ Please enter your message (min. 10 chars)</div>
                        </div>

                        <!-- reCAPTCHA Mock -->
                        <div class="field-anim mb-5">
                            <div class="flex items-center gap-4 rounded-2xl border-2 border-orange-100 bg-orange-50 px-5 py-3.5">
                                <div id="captchaBox" class="captcha-box w-6 h-6 rounded border-2 border-orange-300 flex-shrink-0 cursor-pointer flex items-center justify-center transition-all duration-200"
                                     onclick="toggleCaptcha(this)"></div>
                                <span class="text-sm font-medium" style="color:#7c2d12;font-family:'Hind',sans-serif;">I'm not a robot</span>
                                <div class="ml-auto text-right">
                                    <div class="text-xs font-bold" style="color:#ea580c;font-family:'Baloo 2',cursive;">reCAPTCHA</div>
                                    <div class="text-xs" style="color:#d97706;opacity:0.6;font-family:'Hind',sans-serif;">Privacy · Terms</div>
                                </div>
                            </div>
                            <div class="err-msg" id="captchaErr">⚠ Please verify you are not a robot</div>
                        </div>

                        <!-- Note -->
                        <div class="field-anim text-center mb-4">
                            <p class="text-xs italic" style="color:#9a3412;opacity:0.65;font-family:'Hind',sans-serif;">
                                ✦ Note: Only few selected queries are answered ✦
                            </p>
                        </div>

                        <!-- Submit Button -->
                        <div class="field-anim">
                            <button type="submit"
                                    class="shimmer-btn w-full py-3.5 rounded-2xl text-white font-bold tracking-wide text-base transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0 hover:shadow-2xl"
                                    style="font-family:'Baloo 2',cursive;box-shadow:0 8px 28px rgba(234,88,12,0.38);">
                                ✉ संदेश भेजें | Submit Message →
                            </button>
                        </div>

                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center py-3 text-xs tracking-widest"
                 style="background:linear-gradient(90deg,rgba(254,215,170,0.4),rgba(253,186,116,0.3),rgba(254,215,170,0.4));color:#c2410c;font-family:'Baloo 2',cursive;">
                ॐ हर हर महादेव | Blessed by Divine Grace ॐ
            </div>
        </div>
    </div>

    <!-- ═══ SUCCESS OVERLAY ═══ -->
    <div id="successOverlay" class="fixed inset-0 flex items-center justify-center" style="display:none!important;z-index:50;background:rgba(74,14,26,0.8);">
        <div class="rounded-3xl p-10 text-center border border-orange-200 max-w-sm w-full mx-4"
             style="background:rgba(255,247,237,0.97);box-shadow:0 30px 80px rgba(194,65,12,0.3);">
            <div class="text-5xl mb-4">🪷</div>
            <h2 class="text-2xl font-extrabold mb-2" style="color:#c2410c;font-family:'Baloo 2',cursive;">ॐ शांति</h2>
            <p class="text-sm mb-1" style="color:#7c2d12;font-family:'Hind',sans-serif;">आपका संदेश प्रेम और प्रकाश के साथ प्राप्त हुआ।</p>
            <p class="text-xs italic mb-6" style="color:#9a3412;font-family:'Hind',sans-serif;">Your message has been received. We shall respond in due course.</p>
            <button onclick="closeSuccess()"
                    class="px-8 py-2.5 rounded-xl text-white font-bold text-sm transition-all hover:-translate-y-0.5"
                    style="background:linear-gradient(135deg,#c2410c,#ea580c);font-family:'Baloo 2',cursive;box-shadow:0 6px 20px rgba(194,65,12,0.35);">
                Close — बंद करें
            </button>
        </div>
    </div>
        </div>
    </div>
    <script>
        let captchaDone = false;

        function toggleCaptcha(el) {
            captchaDone = !captchaDone;
            el.classList.toggle('ticked', captchaDone);
            el.innerHTML = captchaDone ? '<span style="color:white;font-size:14px;font-weight:bold;">✓</span>' : '';
            if (captchaDone) document.getElementById('captchaErr').classList.remove('show');
        }

        function closeSuccess() {
            document.getElementById('successOverlay').style.display = 'none';
        }

        // Remove error on input
        document.querySelectorAll('input, select, textarea').forEach(el => {
            el.addEventListener('input', () => el.classList.remove('error-field'));
            el.addEventListener('change', () => el.classList.remove('error-field'));
        });

        function chk(id, errId, testFn) {
            if (!id) return true;
            const el = document.getElementById(id);
            if (!el || !errId) return true;
            const ok = testFn(el.value ? el.value.trim() : '');
            el.classList.toggle('error-field', !ok);
            document.getElementById(errId).classList.toggle('show', !ok);
            return ok;
        }

        function getRadio(name) {
            const r = document.querySelector(`input[name="${name}"]:checked`);
            return r ? r.value : '';
        }

        function chkRadio(name, errId) {
            const ok = !!getRadio(name);
            document.getElementById(errId).classList.toggle('show', !ok);
            return ok;
        }

        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let valid = true;

            if (!chk('name',    'nameErr',   v => v.length >= 2))      valid = false;
            if (!chk('email',   'emailErr',  v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v))) valid = false;
            if (!chk('mobile',  'mobileErr', v => v === '' || /^\d{10}$/.test(v)))        valid = false;
            if (!chk('city',    'cityErr',   v => v.length >= 2))      valid = false;
            if (!chk('gyan',    'gyanErr',   v => v !== ''))            valid = false;
            if (!chk('message', 'msgErr',    v => v.length >= 10))     valid = false;

            if (!chkRadio('gender', 'genderErr')) valid = false;
            if (!chkRadio('murli',  'murliErr'))  valid = false;
            if (!chkRadio('want',   'wantErr'))   valid = false;
            if (!chkRadio('lang',   'langErr'))   valid = false;

            if (!captchaDone) {
                document.getElementById('captchaErr').classList.add('show');
                valid = false;
            }

            if (valid) {
                document.getElementById('successOverlay').style.cssText = 'display:flex!important;z-index:50;background:rgba(74,14,26,0.8);position:fixed;inset:0;align-items:center;justify-content:center;';
                this.reset();
                captchaDone = false;
                const cb = document.getElementById('captchaBox');
                cb.classList.remove('ticked');
                cb.innerHTML = '';
            } else {
                const first = document.querySelector('.error-field');
                if (first) first.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    </script>
@endsection
