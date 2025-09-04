@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Service</h2>
    <form method="POST" action="{{ route('admin.services.store') }}">
        @csrf
        
        <div class="form-group mb-2">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mb-2">
            <label for="status">Status</label>
            <select name="status">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            
        </div>

        <button type="submit" class="btn btn-success mt-3">Create Service</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mt-3">Back to Services</a>
    </form>
</div>
@endsection
