@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        <a class="block p-4 bg-white shadow rounded" href="{{ route('admin.users.index') }}">
            <h3 class="font-bold">Users</h3>
            <p>Manage users & roles</p>
        </a>
        <a class="block p-4 bg-white shadow rounded" href="{{ route('admin.blogs.index') }}">
            <h3 class="font-bold">Blogs</h3>
            <p>Manage posts</p>
        </a>
        <a class="block p-4 bg-white shadow rounded" href="{{ route('admin.services.index') }}">
            <h3 class="font-bold">Services</h3>
            <p>Manage service requests</p>
        </a>
        {{-- ✅ New Contact Management card --}}
        <a class="block p-4 bg-white shadow rounded" href="{{ route('admin.contacts.index') }}">
            <h3 class="font-bold">Contacts</h3>
            <p>Manage contact messages</p>
        </a>
    </div>
</div>
@endsection
