@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Blog</h2>

    <form action="{{ route('admin.blogs.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Blog</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
