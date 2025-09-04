@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Services</h2>

    @if($services->count() > 0)
        <div class="list-group">
            @foreach ($services as $service)
                <a href="{{ route('services.show', $service->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span>{{ $service->title }}</span>
                    <span class="badge bg-info text-dark">{{ ucfirst($service->status) }}</span>
                </a>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $services->links() }}
        </div>
    @else
        <p>No services available at the moment.</p>
    @endif
</div>
@endsection
