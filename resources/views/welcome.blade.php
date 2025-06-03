<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a Encuéntranos UGB</title>
    <style>
        body {
            background: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            color: #333;
        }
        p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }
        .btn {
            padding: 12px 25px;
            font-size: 1rem;
            background-color: #3490dc;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenidos a Encuentranos UGB</h1>
        <p>Conéctate con tu comunidad académica de forma rápida y segura.</p>
        <a href="{{ route('login') }}" class="btn">Comenzar</a>
    </div>
</body>
</html>
