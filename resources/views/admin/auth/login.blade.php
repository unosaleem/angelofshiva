<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500">

<div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>

<div x-data="{ showPassword:false, loading:false }"
     class="relative w-full max-w-md p-8 bg-white/20 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/30 animate-fadeIn">

    <h2 class="text-3xl font-bold text-center text-white mb-6">
        🔐 Admin Login
    </h2>

    {{-- Global Error --}}
    @if ($errors->any())
        <div class="mb-4 p-3 rounded-lg bg-red-500/20 border border-red-400 text-white text-sm animate-pulse">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.login.submit') }}"
          @submit="loading = true"
          class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label class="text-white text-sm">Email Address</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   class="w-full mt-2 px-4 py-3 rounded-xl bg-white/80 focus:outline-none focus:ring-4
                   @error('email') ring-4 ring-red-400 border-red-500 @enderror
                   focus:ring-indigo-400 transition duration-300"
                   placeholder="Enter email">
            @error('email')
            <p class="text-red-200 text-sm mt-1 animate-pulse">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label class="text-white text-sm">Password</label>
            <div class="relative">
                <input :type="showPassword ? 'text' : 'password'"
                       name="password"
                       class="w-full mt-2 px-4 py-3 rounded-xl bg-white/80 focus:outline-none focus:ring-4
                       @error('password') ring-4 ring-red-400 border-red-500 @enderror
                       focus:ring-indigo-400 transition duration-300"
                       placeholder="Enter password">

                <button type="button"
                        @click="showPassword = !showPassword"
                        class="absolute right-3 top-5 text-gray-600 text-sm">
                    👁
                </button>
            </div>

            @error('password')
            <p class="text-red-200 text-sm mt-1 animate-pulse">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember --}}
        <div class="flex items-center text-white text-sm">
            <input type="checkbox" name="remember" class="mr-2">
            Remember me
        </div>

        {{-- Login Button --}}
        <button type="submit"
                class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold
                hover:scale-105 hover:shadow-lg transition duration-300 disabled:opacity-50"
                :disabled="loading">

            <span x-show="!loading">Login</span>
            <span x-show="loading">Logging in...</span>
        </button>
    </form>

</div>

<style>
    @keyframes fadeIn {
        from { opacity:0; transform:translateY(20px); }
        to { opacity:1; transform:translateY(0); }
    }
    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out;
    }
</style>

</body>
</html>
