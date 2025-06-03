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
      <a class="navbar-brand" href="{{ route('home') }}">Encuéntranos UGB</a>
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


<!-- Contenido principal -->
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <h1 class="text-center mb-5">Preguntas Frecuentes</h1>
      
      <div class="accordion" id="faqAccordion">
        <!-- Pregunta 1 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta1">
              ¿Qué es esta plataforma?
            </button>
          </h2>
          <div id="pregunta1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Es un sistema web para que los estudiantes reporten y encuentren objetos perdidos dentro de la universidad. Puedes publicar objetos que hayas encontrado o buscar los que hayas perdido.
            </div>
          </div>
        </div>
        
        <!-- Pregunta 2 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta2">
              ¿Cómo me registro?
            </button>
          </h2>
          <div id="pregunta2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <ol>
                <li>Haz clic en "Registrarse" en la página de inicio.</li>
                <li>Completa el formulario con tus datos (nombre, correo institucional @ugb.edu.sv y contraseña).</li>
                <li>Confirma tu registro y ¡listo!</li>
              </ol>
            </div>
          </div>
        </div>
        
        <!-- Pregunta 3 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta3">
              ¿Por qué no puedo registrarme con mi correo personal?
            </button>
          </h2>
          <div id="pregunta3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Por seguridad, solo se permiten correos institucionales (@ugb.edu.sv) para evitar registros falsos.
            </div>
          </div>
        </div>
        
        <!-- Pregunta 4 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta4">
              ¿Cómo reporto un objeto perdido?
            </button>
          </h2>
          <div id="pregunta4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <ol>
                <li>Inicia sesión.</li>
                <li>Ve a la sección "Reportar objeto".</li>
                <li>Completa el formulario: descripción, lugar, fecha y sube una foto (opcional).</li>
                <li>Enviar el reporte.</li>
              </ol>
            </div>
          </div>
        </div>
        
        <!-- Pregunta 5 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta5">
              ¿Puedo editar o eliminar un reporte que hice?
            </button>
          </h2>
          <div id="pregunta5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Sí, en la página de inicio, busca tu reporte y usa las opciones "Editar" o "Eliminar" (solo disponible para tus publicaciones).
            </div>
          </div>
        </div>
        
        <!-- Pregunta 6 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta6">
              ¿Cómo busco un objeto perdido?
            </button>
          </h2>
          <div id="pregunta6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <ol>
                <li>En la página principal (Home), verás una lista de objetos reportados.</li>
                <li>Usa los filtros (ej. "Libros", "Electrónicos") o la barra de búsqueda para encontrar algo específico.</li>
              </ol>
            </div>
          </div>
        </div>
        
        <!-- Pregunta 7 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta7">
              Olvidé mi contraseña. ¿Qué hago?
            </button>
          </h2>
          <div id="pregunta7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <ol>
                <li>Haz clic en "¿Olvidaste tu contraseña?" en el login.</li>
                <li>Ingresa tu correo institucional y sigue las instrucciones para restablecerla.</li>
              </ol>
            </div>
          </div>
        </div>
        
        <!-- Pregunta 8 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta8">
              ¿Cómo cambio mi contraseña?
            </button>
          </h2>
          <div id="pregunta8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              <ol>
                <li>Inicia sesión.</li>
                <li>Ve a "Mi perfil" o "Configuración".</li>
                <li>Selecciona "Modificar contraseña" y sigue los pasos.</li>
              </ol>
            </div>
          </div>
        </div>
        
        <!-- Pregunta 9 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta9">
              ¿La plataforma es móvil?
            </button>
          </h2>
          <div id="pregunta9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Sí, la plataforma es responsive y puede usarse en celulares, aunque estamos trabajando en mejorar esta experiencia.
            </div>
          </div>
        </div>
        
        <!-- Pregunta 10 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta10">
              ¿Qué hago si encuentro un error o necesito ayuda?
            </button>
          </h2>
          <div id="pregunta10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Contacta al equipo de soporte mediante el correo electrónico proporcionado en la página de bienvenida o reporta el problema en la sección de "Ayuda" (próximamente).
            </div>
          </div>
        </div>
        
        <!-- Pregunta 11 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta11">
              ¿Puedo subir fotos de los objetos?
            </button>
          </h2>
          <div id="pregunta11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Sí, al reportar un objeto, hay una opción para subir imágenes (formatos soportados: JPG, PNG).
            </div>
          </div>
        </div>
        
        <!-- Pregunta 12 -->
        <div class="accordion-item mb-3 border rounded">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta12">
              ¿Los reportes son anónimos?
            </button>
          </h2>
          <div id="pregunta12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              No, tu nombre de usuario aparecerá en el reporte, pero datos personales como tu correo no son visibles para otros usuarios.
            </div>
          </div>
        </div>
<!-- Pregunta 13 -->
<div class="accordion-item mb-3 border rounded">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta13">
      ¿Hay algún límite de reportes que puedo hacer?
    </button>
  </h2>
  <div id="pregunta13" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      No hay un límite estricto, pero te recomendamos ser responsable con tus reportes. Si el sistema detecta abuso (como múltiples reportes duplicados), tu cuenta podría ser revisada por los administradores.
    </div>
  </div>
</div>

<!-- Pregunta 14 -->
<div class="accordion-item mb-3 border rounded">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta14">
      ¿Qué hago si encuentro un objeto reportado como perdido?
    </button>
  </h2>
  <div id="pregunta14" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      <ol>
        <li>Localiza el reporte del objeto en la plataforma</li>
        <li>Haz clic en "Contactar al dueño" (el sistema protegerá tu información personal)</li>
        <li>Coordina la devolución de manera segura (recomendamos hacerlo en áreas públicas de la universidad)</li>
      </ol>
    </div>
  </div>
</div>



<!-- Pregunta 15 -->
<div class="accordion-item mb-3 border rounded">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pregunta15">
      ¿Los objetos reportados tienen fecha de expiración?
    </button>
  </h2>
  <div id="pregunta15" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
    <div class="accordion-body">
      Sí, los reportes permanecen activos por 30 días naturales. Si el objeto no es reclamado en ese período:
      <ul>
        <li>El reporte se archiva automáticamente</li>
        <li>Recibirás una notificación para saber si deseas renovarlo por 15 días más</li>
        <li>Los objetos físicos deben ser entregados a la oficina de objetos perdidos de la universidad</li>
      </ul>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>