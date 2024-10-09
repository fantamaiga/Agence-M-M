<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Utilisation de @yield pour le titre de la page -->
    <title>@yield('title') | M&M Agence</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-warning navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Agence</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        @php
        $route = request()->route()->getName();
        @endphp
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('propriete.index') }}" @class(['nav-link', 'active' => str_contains($route, 'propriete.')])>Biens</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Section où le contenu principal sera injecté -->
<div class="container mt-4">
    @yield('content')
</div>

<!-- Scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
