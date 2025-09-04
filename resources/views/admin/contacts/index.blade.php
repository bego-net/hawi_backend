<!-- resources/views/admin/contacts/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    <ul>
        @foreach($contacts as $contact)
            <li>
                <a href="{{ route('admin.contacts.show', $contact->id) }}">
                    {{ $contact->name }} - {{ $contact->email }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
