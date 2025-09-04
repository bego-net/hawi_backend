@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Service</h2>

    <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $service->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            
        </div>

        <button type="submit" class="btn btn-success">Update Service</button>
    </form>

    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mt-3">Back to Services</a>
</div>
@endsection
