<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Encuéntranos UGB - Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Inter', sans-serif;
    }
    .navbar-brand {
      font-weight: bold;
    }
    .reporte-card {
      background: #fff;
      border-radius: 0.375rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 1.5rem;
      margin-bottom: 1rem;
      transition: transform 0.2s ease-in-out;
    }
    .reporte-card:hover {
      transform: scale(1.02);
    }
    .reporte-foto {
      max-width: 100%;
      height: auto;
      margin-top: 1rem;
      border-radius: 0.375rem;
      object-fit: cover;
    }
    .no-foto {
      color: #6c757d;
      font-style: italic;
      margin-top: 1rem;
    }

           .navbar {
    background-color: #3490dc !important;
                height: 6.5rem;
            font-size: 1.3rem;
            padding: 0 7rem;
}
  </style>
</head>
<body>

  <!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Encuéntranos UGB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContenido">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('reporte.form') }}">
              <i class="bi bi-plus-circle"></i> Crear Reporte
            </a>
          </li>
           <li class="nav-item">
              <a class="nav-link" href="{{ route('faq') }}">
                <i class="bi bi-question-circle"></i> FAQ
              </a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">
              <i class="bi bi-person-circle"></i> Perfil
            </a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="nav-link btn btn-link text-white" style="text-decoration: none;" type="submit">
                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1 class="mb-4">Reportes Estudiantiles</h1>

    @foreach($reportes as $reporte)
      <div class="reporte-card">
        <h5><strong>{{ $reporte->nombre }}</strong></h5>
        <p>{{ $reporte->descripcion }}</p>
        <p><small class="text-muted">Ubicación: {{ $reporte->ubicacion }}</small></p>

        @if($reporte->foto)
          <img src="{{ asset('storage/' . $reporte->foto) }}" alt="Foto del reporte" class="reporte-foto" />
        @else
          <p class="no-foto">No hay foto</p>
        @endif
      </div>
    @endforeach
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
