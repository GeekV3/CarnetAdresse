<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Carnet d'Adresse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body>
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

    <div class="container">
        <h3 class="mb-4">Liste des Contacts</h3>
        <div class="d-flex justify-content-between mb-3">
            @livewire('create-contact')
            @livewire('search-contacts')
            @livewire('export-contacts')
            @livewire('import-contacts')
        </div>
        
        <div class="contact-list">
            @livewire('contact-list')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>
