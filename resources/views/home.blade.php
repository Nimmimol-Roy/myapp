@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Welcome to Laravel Logging Dashboard</h2>

    <div class="row g-4">
       
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-body">
                    <h5 class="card-title">Request Logs</h5>
                    <p class="card-text">View all incoming HTTP requests and their response time.</p>
                    <a href="{{ route('logs.index') }}" class="btn btn-primary">View Logs</a>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
