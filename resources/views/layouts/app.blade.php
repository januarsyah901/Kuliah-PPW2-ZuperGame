<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuper Game - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

<!-- Navbar -->
<nav class="bg-yellow-500 text-black p-4">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="font-bold text-lg"> Zuper Game</a>
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="{{ route('stat') }}" class="hover:underline">Statistic</a>
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @else
                <a href="{{ route('games.create') }}" class="hover:underline">Add New</a>
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="" style="background:transparent;border:none;color:#0366d6;cursor:pointer;margin-left:1rem;padding:0">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>


<!-- Main Content -->
<main class="flex-grow py-10 ">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-gray-400 text-center py-4">
    © {{ date('Y') }} Zuper Game. All Rights Reserved.
</footer>
</body>
</html>
