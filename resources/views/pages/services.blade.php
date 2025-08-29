@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Our Services</h2>
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card shadow p-3 text-center">
                    <i class="{{ $service->icon }} fa-3x mb-3"></i>
                    <h4>{{ $service->title }}</h4>
                    <p>{{ $service->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
