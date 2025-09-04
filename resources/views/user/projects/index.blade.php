@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Projects</h1>

    <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">+ New Project</a>

    <ul class="mt-3">
        @foreach ($projects as $project)
    <tr>
        <td>{{ $project->title }}</td>
        <td>{{ $project->status }}</td>
        <td>{{ $project->progress }}%</td>
        <td>
            <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
        </td>
    </tr>
@endforeach

    </ul>
</div>
@endsection
