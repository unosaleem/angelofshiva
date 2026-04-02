<!DOCTYPE html>
<html>
<head>
    <title>Enterprise Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    @include('admin.layout.sidebar')

    <div class="flex-1 flex flex-col">
        @include('admin.layout.navbar')

        <main class="p-6">
            @yield('content')
        </main>
    </div>

</div>

</body>
</html>
