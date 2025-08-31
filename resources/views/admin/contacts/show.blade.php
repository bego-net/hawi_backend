@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Message from {{ $contact->name }}</h2>

    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <hr>

    <h4>Responses</h4>
    @if($contact->responses->isEmpty())
        <p>No responses yet.</p>
    @else
        <ul class="list-group mb-3">
            @foreach($contact->responses as $response)
                <li class="list-group-item">
                    <strong>{{ $response->admin->name }}:</strong> 
                    {{ $response->response }}
                    <br><small>{{ $response->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('admin.contacts.respond', $contact->id) }}">
        @csrf
        <div class="form-group">
            <label for="response">Your Response</label>
            <textarea name="response" id="response" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Send Response</button>
    </form>

    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
