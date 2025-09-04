@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Blogs</h2>

    @if($blogs->count() > 0)
        @foreach ($blogs as $blog)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $blog->title }}</h4>
                    <p class="card-text">{{ $blog->content }}</p>
                    <small class="text-muted">
                        By {{ $blog->user->name ?? 'Unknown' }} | {{ $blog->created_at->format('M d, Y') }}
                    </small>
                </div>
            </div>
        @endforeach

        <div class="mt-3">
            {{ $blogs->links() }}
        </div>
    @else
        <p>No blogs available at the moment.</p>
    @endif
</div>
@endsection
