@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Project</h1>

    <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $project->description }}</textarea>
        </div>

        <div>
            <label>Progress (%)</label>
            <input type="number" name="progress" class="form-control" value="{{ $project->progress }}" min="0" max="100">
        </div>

        <div>
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
