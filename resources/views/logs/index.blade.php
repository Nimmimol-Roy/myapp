@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Request Logs</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('logs.clear') }}" onsubmit="return confirm('Clear all logs?')">
        @csrf
        <button type="submit" class="btn btn-danger mb-3">Clear Logs</button>
        <a href="{{ route('logs.index') }}" class="btn btn-secondary mb-3">Refresh</a>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Method</th>
                <th>URL</th>
                <th>IP</th>
                <th>Response Time (ms)</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @forelse($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->method }}</td>
                <td>{{ $log->url }}</td>
                <td>{{ $log->ip_address }}</td>
                <td>{{ $log->response_time_ms }}</td>
                <td>{{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d H:i:s') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No logs found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-3">
    {{ $logs->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
