<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>

    @auth
    <p>Bienvenido {{auth()->user()->name}} bro , estas autenticado a la pagina</p>
    <p>
        <a href="/logout">Logout</a>
    </p>
    @endauth

    @guest
    <p>Na na na no estas autenticado bro, primero tienes que <a href="/login">iniciar sesion</a><p>
    @endguest
</body>
</html>