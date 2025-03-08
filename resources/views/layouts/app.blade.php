<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 15px;
            border-radius: 0 0 15px 15px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            opacity: 0.8;
        }

        .container {
            margin-top: 30px;
        }

        .contact-list {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .contact-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: 0.3s;
        }

        .contact-item:hover {
            background: #f9f9f9;
        }

        .btn-action {
            margin-left: 10px;
            transition: 0.3s;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }
    </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            <!-- 🚀 NAVBAR AVEC DÉGRADÉ -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#">Carnet d'Adresse</a>
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                        <a class="nav-link" href="#">Contacts</a>
                        <a href="{{ route('tags.index') }}" class="nav-link">Tags</a>
                        <a class="nav-link" href="#">Groupes</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- ✅ FIN DU NAVBAR -->

            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="container mt-4">
                @yield('content')
            </main>
        </div>

        @livewireScripts
    </body>
</html>
