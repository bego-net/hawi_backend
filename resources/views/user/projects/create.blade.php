@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Project</h1>

    <form action="{{ route('dashboard.projects.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div>
            <label>Progress (%)</label>
            <input type="number" name="progress" class="form-control" min="0" max="100">
        </div>

        <div>
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
