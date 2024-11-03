<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home Page</title>
</head>
<body>
    {{-- <h1>{{ auth()->user()->name }}</h1> --}}
    <h1>Admin Home Page</h1>

    <p>{{ auth()->user()->name}} | {{ auth()->user()->email; }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf {{-- this is needed to properly work the log out process --}}
        {{-- <button type="submit">Log Out</button> --}}
        <input type="submit" value="Log Out">
    </form>
</body>
</html>
