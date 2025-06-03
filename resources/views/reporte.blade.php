<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Crear Reporte | Encuéntranos UGB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            padding: 0;
            margin: 0;
        }

        .navbar {
            background-color: #3490dc !important;
            height: 6.5rem;
            font-size: 1.3rem;
            padding: 0 7rem;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .form-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 700px;
            margin: 3rem auto;
        }

        h1 {
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 600;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.25rem;
            margin-bottom: 1.25rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            resize: vertical;
        }

        textarea {
            min-height: 120px;
        }

        button[type="submit"] {
            background-color: #3490dc;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 4px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0a58ca;
        }

        #video {
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-secondary, .btn-success, .btn-danger {
            margin-right: 0.7rem;
        }

        /* Ajuste para botones de cámara */
        .camera-buttons {
            margin-bottom: 1rem;
        }

        /* Imagen preview redondeada */
        #preview {
            border-radius: 4px;
        }
    </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Encuéntranos UGB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
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
</header>

<div class="form-container">
    <h1>Nuevo Reporte</h1>

    <form action="{{ route('reporte.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required>

        <label for="foto">Foto (puedes seleccionarla o tomarla directamente):</label>
        <input type="file" accept="image/*" id="foto" name="foto" class="form-control mb-3">

        <div class="camera-buttons">
            <button type="button" class="btn btn-secondary mb-2" id="activarCamara">Activar Cámara</button>
            <button type="button" class="btn btn-success mb-2" id="tomarFoto" style="display:none;">Tomar Foto</button>
            <button type="button" class="btn btn-danger mb-2" id="descartarFoto" style="display:none;">Descartar Foto</button>
        </div>

        <video id="video" width="100%" autoplay style="display:none;" class="mb-3"></video>

        <canvas id="canvas" style="display:none;"></canvas>
        <img id="preview" style="max-width: 100%; margin-top: 10px; display: none; border-radius: 4px;">

        <button type="submit" class="mt-4">Enviar</button>
    </form>
</div>

<script>
    const activarCamara = document.getElementById('activarCamara');
    const tomarFoto = document.getElementById('tomarFoto');
    const descartarFoto = document.getElementById('descartarFoto');
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const preview = document.getElementById('preview');
    const inputFoto = document.getElementById('foto');

    let stream;

    activarCamara.addEventListener('click', async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
            video.style.display = 'block';
            tomarFoto.style.display = 'inline-block';
            descartarFoto.style.display = 'inline-block';
            // Limpiar preview y input cuando se activa cámara
            preview.style.display = 'none';
            inputFoto.value = '';
        } catch (err) {
            alert('No se pudo acceder a la cámara: ' + err.message);
        }
    });

    tomarFoto.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Detener la cámara
        stream.getTracks().forEach(track => track.stop());
        video.style.display = 'none';
        tomarFoto.style.display = 'none';

        // Mostrar imagen
        const imageDataUrl = canvas.toDataURL('image/png');
        preview.src = imageDataUrl;
        preview.style.display = 'block';

        // Convertir la imagen a Blob y cargarla como archivo en el input
        fetch(imageDataUrl)
            .then(res => res.blob())
            .then(blob => {
                const file = new File([blob], "captura.png", { type: "image/png" });

                // Cargar archivo manualmente en el input tipo file
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                inputFoto.files = dataTransfer.files;
            });
    });

    descartarFoto.addEventListener('click', () => {
        // Detener la cámara si está activa
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }
        video.style.display = 'none';
        tomarFoto.style.display = 'none';
        descartarFoto.style.display = 'none';
        preview.style.display = 'none';
        inputFoto.value = '';
    });
</script>




<!-- Experimental  -->

<!--
    <form action="{{ route('reportes.borrarTodo') }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar TODOS los reportes y fotos? Esta acción no se puede deshacer.');">
    @csrf
    <button type="submit" class="btn btn-danger mb-3">
        <i class="bi bi-trash"></i> Borrar todos los reportes y fotos
    </button>

-->





<!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
