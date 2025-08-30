<form method="POST" action="{{ route('admin.services.update', $service->id) }}">
    @csrf
    @method('PUT') <!-- This method is important for handling PUT requests -->
    
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
        <select name="status" id="status" class="form-control" required>
            <option value="pending" {{ $service->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in-progress" {{ $service->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $service->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update Service</button>
</form>
