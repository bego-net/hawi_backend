@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Message from {{ $contact->name }}</h1>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>

    <hr>
    <h3>Send Response</h3>
    <form action="{{ route('admin.contacts.respond', $contact->id) }}" method="POST">
        @csrf
        <textarea name="response" rows="5" class="form-control" required></textarea>
        <button type="submit" class="btn btn-success mt-2">Send Reply</button>
    </form>
</div>
@endsection
