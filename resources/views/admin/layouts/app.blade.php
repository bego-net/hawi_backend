<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('admin.contacts.index') }}">Contacts</a> |
        <a href="{{ route('logout') }}">Logout</a>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
