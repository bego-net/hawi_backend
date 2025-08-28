@extends('layouts.app')

@section('content')
    <h1>Contact Us</h1>
    <form>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Message</label>
            <textarea class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Send</button>
    </form>
@endsection
