<aside class="w-64 bg-gradient-to-b from-indigo-700 to-purple-800 text-white hidden md:flex flex-col">

    <div class="p-6 text-xl font-bold border-b border-white/20">
        🚀 Admin Panel
    </div>

    <nav class="flex-1 p-4 space-y-2">

        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-white/20">
            Dashboard
        </a>

        @role('super-admin')
        <a href="{{ route('admin.logs') }}" class="block px-4 py-2 rounded hover:bg-white/20">
            Audit Logs
        </a>
        @endrole

        @can('user.view')
            <a href="#" class="block px-4 py-2 rounded hover:bg-white/20">
                Users
            </a>
        @endcan

    </nav>

</aside>
