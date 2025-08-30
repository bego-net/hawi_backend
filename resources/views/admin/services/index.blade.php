@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Services</h2>

    {{-- Corrected route name --}}
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">Add Service</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->title }}</td>
                <td>{{ Str::limit($service->description, 50) }}</td>
                <td>
                    {{-- Dropdown to update status --}}
                    <form action="{{ route('admin.services.updateStatus', $service->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="pending" {{ $service->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in-progress" {{ $service->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $service->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.services.edit',$service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete service?')">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
