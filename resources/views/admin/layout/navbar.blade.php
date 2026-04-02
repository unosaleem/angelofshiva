<nav class="bg-white shadow p-4 flex justify-between items-center">

    <h1 class="font-bold text-lg">Dashboard</h1>

    <div class="flex items-center gap-4">
        <span>{{ auth('admin')->user()->name }}</span>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Logout
            </button>
        </form>
    </div>

</nav>
