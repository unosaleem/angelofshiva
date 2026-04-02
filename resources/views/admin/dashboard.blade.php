@extends('admin.layout.app')

@section('content')

    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-6 rounded-xl shadow">
            <h2>Total Admins</h2>
            <p class="text-3xl font-bold text-indigo-600">{{ $totalAdmins }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h2>Total Users</h2>
            <p class="text-3xl font-bold text-green-600">{{ $totalUsers }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h2>Total Logs</h2>
            <p class="text-3xl font-bold text-red-600">{{ $totalLogs }}</p>
        </div>

    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="mb-4 font-semibold">User Growth (Monthly)</h2>
        <canvas id="userChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('userChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($usersChart->toArray())) !!},
                datasets: [{
                    label: 'Users',
                    data: {!! json_encode(array_values($usersChart->toArray())) !!},
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.3
                }]
            }
        });
    </script>

@endsection
