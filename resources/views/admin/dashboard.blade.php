@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>
    <div class="list-group">
        <a href="{{ route('admin.users.index') }}" class="list-group-item">👤 Manage Users</a>
        <a href="{{ route('admin.blogs.index') }}" class="list-group-item">📝 Manage Blogs</a>
        <a href="{{ route('admin.services.index') }}" class="list-group-item">⚙️ Manage Services</a>
        <a href="{{ route('admin.contacts.index') }}" class="list-group-item">📩 View Contact Submissions</a>
    </div>
</div>
@endsection
