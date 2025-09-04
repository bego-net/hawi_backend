{{-- resources/views/user/dashboard/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Dashboard</h1>

    <p>Welcome, {{ Auth::user()->name }}!</p>

    <div class="grid grid-cols-3 gap-4 mt-4">
        {{-- Total Projects --}}
        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-bold">Projects</h3>
            <p>{{ $projectsCount ?? 0 }}</p>
            <a href="{{ route('dashboard.projects.index') }}" 
               class="text-blue-500 underline hover:text-blue-700">
               Manage Projects
            </a>
            <a href="{{ route('dashboard.projects.create') }}" 
                class="ml-2 text-green-500 underline hover:text-green-700">
                + Create Project
            </a>
            <a href="{{ route('dashboard.profile.edit') }}" class="btn btn-info">Edit Profile</a>


        </div>
        

        {{-- Average Progress --}}
        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-bold">Average Progress</h3>
            <p>{{ round($avgProgress) }}%</p>
        </div>

        {{-- Projects by Status --}}
        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-bold">Projects by Status</h3>
            @if (!empty($projectByStatus) && $projectByStatus->count())
                <ul>
                    @foreach ($projectByStatus as $status => $count)
                        <li>{{ ucfirst($status) }}: {{ $count }}</li>
                    @endforeach
                </ul>
            @else
                <p>No projects found</p>
            @endif
        </div>
    </div>

    {{-- Recent Service Requests --}}
    <div class="mt-6 p-4 bg-white shadow rounded">
        <h3 class="font-bold">Recent Service Requests</h3>
        @if ($requests->count())
            <ul>
                @foreach ($requests as $request)
                    <li>{{ $request->title }} - {{ $request->status }}</li>
                @endforeach
            </ul>
        @else
            <p>No recent service requests.</p>
        @endif
    </div>

    {{-- Recent Messages --}}
    <div class="mt-6 p-4 bg-white shadow rounded">
        <h3 class="font-bold">Recent Messages</h3>
        @if ($messages->count())
            <ul>
                @foreach ($messages as $msg)
                    <li>{{ $msg->message }}</li>
                @endforeach
            </ul>
        @else
            <p>No messages yet.</p>
        @endif
    </div>

    
</div>
@endsection
