@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
        </div>

        <div>
            <label>Company</label>
            <input type="text" name="company" value="{{ old('company', $user->company) }}" class="form-control">
        </div>

        <div>
            <label>Password (leave blank if unchanged)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div>
            <label>Profile Picture</label><br>
            @if($user->profile_pic)
                <img src="{{ asset($user->profile_pic) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="profile_pic" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
    </form>
</div>
@endsection
