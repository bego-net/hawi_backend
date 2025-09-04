@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $service->title }}</h2>
    <p><strong>Status:</strong> {{ ucfirst($service->status) }}</p>
    <hr>
    <p>{{ $service->description }}</p>

    <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3">Back to Services</a>
</div>
@endsection
