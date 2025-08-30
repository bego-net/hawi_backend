@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ Auth::user()->name }} 👋</h1>
    <p>You are logged in as a normal user.</p>
</div>
@endsection
