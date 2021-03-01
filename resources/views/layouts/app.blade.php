<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedMyFridge</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6 text-lg shadow-md">
        <ul class="flex items-center">
            <li>
                <a href=" {{ route('home') }} " class="p-3">Home</a>
            </li>
            @auth
            <li>
                <a href="{{ route('fridges.index') }}" class="p-3">My fridges</a>
            </li>  
            @endauth
        </ul>
        <ul class="flex items-center">
            @auth
            <li>
                <p class="p-2 pr-6">{{ auth()->user()->name }}</p>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"class="inline bg-red-500
                    rounded-lg text-white p-2 hover:bg-red-700">Logout</button>
                </form>
            </li>
            @endauth
            @guest
            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>