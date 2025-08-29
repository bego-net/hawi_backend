@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Contact Us</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" rows="4" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Our Location</h4>
            <div class="map-responsive">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.491135250925!2d39.27424587370803!3d8.548679896325265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b1f79de350dc3%3A0x9f1b6d3f664b4b87!2sHawi%20Software%20Solutions!5e0!3m2!1sen!2set!4v1756471588012!5m2!1sen!2set" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
