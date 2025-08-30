@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Blogs</h2>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create Blog</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th><th>Title</th><th>Author</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->user->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete blog?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
