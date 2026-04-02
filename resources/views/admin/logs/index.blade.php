@extends('admin.layout.app')

@section('content')

    <h2 class="text-xl font-bold mb-4">Audit Logs</h2>

    <form method="GET" class="grid md:grid-cols-5 gap-4 mb-6">

        <select name="admin_id" class="border p-2 rounded">
            <option value="">All Admins</option>
            @foreach($admins as $admin)
                <option value="{{ $admin->id }}"
                    {{ request('admin_id') == $admin->id ? 'selected' : '' }}>
                    {{ $admin->name }}
                </option>
            @endforeach
        </select>

        <select name="event_type" class="border p-2 rounded">
            <option value="">All Events</option>
            <option value="created">Created</option>
            <option value="updated">Updated</option>
            <option value="deleted">Deleted</option>
        </select>

        <input type="text"
               name="model_type"
               value="{{ request('model_type') }}"
               placeholder="Model Type"
               class="border p-2 rounded">

        <input type="date" name="from" value="{{ request('from') }}" class="border p-2 rounded">
        <input type="date" name="to" value="{{ request('to') }}" class="border p-2 rounded">

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Filter
        </button>

    </form>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
            <tr>
                <th class="p-3">Admin</th>
                <th class="p-3">Event</th>
                <th class="p-3">Model</th>
                <th class="p-3">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr class="border-b">
                    <td class="p-3">{{ $log->admin_id }}</td>
                    <td class="p-3">{{ $log->event_type }}</td>
                    <td class="p-3">{{ $log->model_type }}</td>
                    <td class="p-3">{{ $log->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $logs->links() }}

@endsection
