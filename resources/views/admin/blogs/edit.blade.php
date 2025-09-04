<form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Blog</button>
</form>
