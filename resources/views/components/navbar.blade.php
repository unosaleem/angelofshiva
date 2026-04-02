
    <style>
        /* Smooth height for mobile accordion */
        .mobile-submenu { max-height: 0; overflow: hidden; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .mobile-submenu.open { max-height: 2000px; }

        /* Desktop Hover Animation */
        @media (min-width: 1024px) {
            .submenu-animate { opacity: 0; transform: translateY(10px); transition: all 0.3s ease; pointer-events: none; visibility: hidden; }
            .group:hover > .submenu-animate { opacity: 1; transform: translateY(0); pointer-events: auto; visibility: visible; }
            .group\/nested:hover > .nested-animate { opacity: 1; transform: translateX(0); pointer-events: auto; visibility: visible; }
            .nested-animate { opacity: 0; transform: translateX(10px); transition: all 0.3s ease; pointer-events: none; visibility: hidden; }
        }

        /* Custom Scrollbar for long menus */
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #d10e31; border-radius: 10px; }
    </style>


<nav class="fixed top-0 left-0 right-0 bg-[#d10e31] text-white z-50 shadow-2xl border-b border-red-700/30">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">

            <a href="{!! url('/') !!}" class="flex-shrink-0 flex items-center group">
                <div class=" p-1.5 rounded-lg  group-hover:transition-all">
                    <img style="filter: drop-shadow(2px 4px 3px black);" src="https://angelofshiva.s3.ap-south-1.amazonaws.com/resources/assets/frontend/img/logo2.png"
                         alt="Angel of Shiva" class=" transition-transform group-hover:scale-105">
                </div>
            </a>

            <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-white/10 transition-colors">
                <i class="fas fa-bars text-2xl"></i>
            </button>

            <div class="hidden lg:flex items-center space-x-1 h-full">

                <a href="{!! url('/') !!}" class="px-3 py-2 text-base font-medium hover:bg-white/10 rounded-md transition-all">Home</a>

                @foreach($menus as $menu)
                    <div class="group relative h-full flex items-center">

                        <button class="px-3 py-2 text-base font-medium hover:bg-white/10 rounded-md flex items-center transition-all">
                            {{ $menu->title }}
                            @if($menu->children->count())
                                <i class="fas fa-chevron-down ml-1.5 text-[10px] group-hover:rotate-180 transition-transform"></i>
                            @endif
                        </button>

                        @if($menu->children->count())
                            <div class="submenu-animate absolute top-full m-0 left-0 w-72 bg-white text-gray-800 shadow-xl rounded-b-xl  border-t-4 border-red-700">

                                @foreach($menu->children as $child)

                                    <div class="group/nested relative">

                                        <button class="w-full flex items-center justify-between px-6 py-3 hover:bg-red-50 rounded-b-xl transition-colors font-medium">
                                            <span>{{ $child->title }}</span>

                                            @if($child->children->count())
                                                <i class="fas fa-chevron-right text-[10px]"></i>
                                            @endif
                                        </button>

                                        @if($child->children->count())
                                            <div class="nested-animate absolute top-0 left-full w-80 bg-white shadow-2xl rounded-xl py-2 max-h-[500px] overflow-y-auto ml-0 border-l-4 border-red-600">

                                                @foreach($child->children as $subChild)
                                                    <a href="{!! url('audio', $subChild->title ) !!}"
                                                       class="block px-6 py-2.5 hover:bg-red-50 text-base border-b border-gray-100">
                                                        {{ $subChild->title }}
                                                    </a>
                                                @endforeach

                                            </div>
                                        @endif

                                    </div>

                                @endforeach

                            </div>
                        @endif

                    </div>
                @endforeach

                <a href="/material" class="px-3 py-2 text-base font-medium hover:bg-white/10 rounded-md transition-all">Reading Material</a>

                 <a href="/blog" class="px-3 py-2 text-base font-medium hover:bg-white/10 rounded-md transition-all">Blog</a>

                 <div class="group relative h-full flex items-center">
                    <button class="px-3 py-2 text-base font-medium hover:bg-white/10 rounded-md flex items-center transition-all">
                         Contact <i class="fas fa-chevron-down ml-1.5 text-[10px]"></i>
                    </button>
                    <div class="submenu-animate absolute top-full right-0 w-80 bg-white text-gray-800 shadow-2xl rounded-b-xl py-3 border-t-4 border-red-600">
                         <a href="https://angelofshiva.com/contactus"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors">
                                Contact Us
                            </a>
                            <a href="https://angelofshiva.com/subscribe/whatsapp"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100">
                                Subscribe For WhatsApp
                            </a>
                    </div>
                </div>

                <div class="group relative h-full flex items-center">
                    <button class="px-3 py-2 text-base font-medium hover:bg-white/10 rounded-md flex items-center transition-all">
                        <i class="fas fa-search mr-1.5 text-base"></i> Search <i class="fas fa-chevron-down ml-1.5 text-[10px]"></i>
                    </button>
                    <div class="submenu-animate absolute top-full right-0 w-80 bg-white text-gray-800 shadow-2xl rounded-b-xl py-3 border-t-4 border-red-600">

                         <a href="https://angelofshiva.com/search/customize"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors">
                                Search By Date
                            </a>
                            <a href="https://angelofshiva.com/keyword"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100">
                                Search By Keyword
                            </a>
                            <a href="https://angelofshiva.com/search?action=spteamspeaker"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100">
                                Search By Speaker
                            </a>

                    </div>
                </div>
                <div class="group relative h-full flex items-center">
                    <button class="px-3 py-2 text-base font-medium hover:bg-white/10 rounded-md flex items-center transition-all">
                        <i class="fas fa-file-alt mr-1.5 text-base"></i> Report <i class="fas fa-chevron-down ml-1.5 text-[10px]"></i>
                    </button>
                    <div class="submenu-animate absolute top-full right-0 w-80 bg-white text-gray-800 shadow-2xl rounded-b-xl py-3 border-t-4 border-red-600">
                        <a href="https://angelofshiva.com/search?action=focus"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors">
                                <div class="font-medium">Based on Special Focus</div>
                                <div class="text-base text-gray-500">( Amritvela etc. )</div>
                            </a>
                            <a href="https://angelofshiva.com/search?action=audience"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100">
                                <div class="font-medium">Based on Audience</div>
                                <div class="text-base text-gray-500">( Kumars, Mothers etc. )</div>
                            </a>
                            <a href="https://angelofshiva.com/search?action=hindiwise"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100 text-base">
                                All Hindi - Dr. Sachin Bhai
                            </a>
                            <a href="https://angelofshiva.com/search?action=englishwise"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100 text-base">
                                All English - Dr. Sachin Bhai
                            </a>
                            <a href="https://angelofshiva.com/murliwise"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100 text-base">
                                All Material - Murliwise
                            </a>
                            <a href="https://angelofshiva.com/search?action=powerfull"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100 text-base">
                                Recommended Classes
                            </a>
                            <a href="https://angelofshiva.com/search?action=categoryandsubcategory"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100 text-base">
                                All Audio Based on Category
                            </a>
                            <a href="https://angelofshiva.com/searchrecommended"
                               class="block px-6 py-3 hover:bg-red-50 transition-colors border-t border-gray-100 text-base">
                                Recommended Reading Resource
                            </a>
                    </div>
                </div>

                <div class="hidden lg:flex items-center space-x-3 ml-4 border-l border-white/20 pl-4">

                    @if(Auth::check())
                        <div class="relative group ml-2">
                            <button class="flex items-center space-x-2 focus:outline-none bg-white/10 p-1 pr-3 rounded-full hover:bg-white/20 transition">
                                <img src="https://ui-avatars.com/api/?name={!! auth()->user()->name !!}&background=random" alt="User" class="w-8 h-8 rounded-full border-2 border-white/50">
                                <span class="text-base font-medium">My Account</span>
                                <i class="fas fa-chevron-down text-[10px] group-hover:rotate-180 transition-transform"></i>
                            </button>

                            <div class="submenu-animate absolute top-full right-0 w-56 bg-white text-gray-800 shadow-2xl rounded-xl py-3 mt-0 border-t-4 border-red-600">
                                <div class="px-6 py-2 border-b border-gray-50 mb-2">
                                    <p class="text-xs text-gray-400">Welcome,</p>
                                    <p class="text-base font-bold text-[#d10e31]">{!! auth()->user()->name !!}</p>
                                </div>

                                <a href="/profile" class="flex items-center px-6 py-2.5 hover:bg-red-50 transition-colors text-base">
                                    <i class="fas fa-user-circle mr-3 text-gray-400"></i> View Profile
                                </a>
                                <a href="/favorites" class="flex items-center px-6 py-2.5 hover:bg-red-50 transition-colors text-base">
                                    <i class="fas fa-heart mr-3 text-red-500"></i> View Favorites
                                </a>
                                {{--<a href="/settings" class="flex items-center px-6 py-2.5 hover:bg-red-50 transition-colors text-sm border-b border-gray-50">
                                    <i class="fas fa-cog mr-3 text-gray-400"></i> Settings
                                </a>--}}

                                <a href="{{ route('logout') }}"  class="w-full text-left px-6 py-3 text-base text-red-600 font-bold hover:bg-red-50 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                                </a>

                            </div>
                        </div>
                    @else
                        <div class="flex items-center space-x-2">
                            <a href="{!! route('login') !!}" class="px-4 py-2 text-base font-semibold hover:text-red-200 transition">Login</a>
                            <a href="{!! route('register') !!}" class="px-4 py-2 text-base font-semibold hover:text-red-200 transition">Register</a>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>

    <div id="mobileMenu" class="lg:hidden fixed inset-y-0 right-0 w-full md:w-80 bg-white text-gray-900 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="flex flex-col h-full overflow-y-auto">
            <div class="p-6 bg-[#d10e31] text-white flex justify-between items-center">
                <span class="font-bold text-xl italic">Navigation</span>
                <button id="closeMenu" class="text-2xl hover:rotate-90 transition-transform"><i class="fas fa-times"></i></button>
            </div>

            <div class="p-4 space-y-1">
                <a href="/home" class="block p-4 font-bold border-b border-gray-50 text-[#d10e31]">Home</a>

                <div class="border-b border-gray-50">
                    <button class="accordion-btn w-full flex justify-between items-center p-4 font-bold text-gray-700">
                        BK Dr Sachin <i class="fas fa-chevron-down text-sm"></i>
                    </button>
                    <div class="mobile-submenu bg-gray-50">
                        <button class="accordion-btn w-full flex justify-between items-center px-8 py-4 text-sm font-semibold border-b border-white/50">
                            English Classes <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="mobile-submenu bg-white px-10">
                            <a href="#" class="block py-4 text-xs border-b border-gray-50 italic">The Pure Life</a>
                            <a href="#" class="block py-4 text-xs">Amritvela</a>
                        </div>
                    </div>
                </div>

                <a href="/material" class="block p-4 font-bold border-b border-gray-50 text-gray-700">Reading Material</a>
                <a href="/blog" class="block p-4 font-bold border-b border-gray-50 text-gray-700">Blog</a>
                <a href="/contact" class="block p-4 font-bold border-b border-gray-50 text-gray-700 text-[#d10e31]"><i class="fab fa-whatsapp mr-2"></i>Subscribe</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Logic for Mobile Menu Toggle
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const close = document.getElementById('closeMenu');

    btn.addEventListener('click', () => {
        menu.classList.remove('translate-x-full');
    });

    close.addEventListener('click', () => {
        menu.classList.add('translate-x-full');
    });

    // Mobile Accordion (Triple Level Support)
    document.querySelectorAll('.accordion-btn').forEach(button => {
        button.addEventListener('click', () => {
            const submenu = button.nextElementSibling;
            const chevron = button.querySelector('.fa-chevron-down');

            submenu.classList.toggle('open');
            chevron.classList.toggle('rotate-180');
        });
    });

    // Close on click outside
    window.addEventListener('click', (e) => {
        if (e.target.id === 'mobileMenu') {
            menu.classList.add('translate-x-full');
        }
    });
</script>
