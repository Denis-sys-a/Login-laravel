@extends('layouts.auth-master')

@section('content')

<div class="wrapper">
    <form action="/register" method="POST">
        @csrf

        <h2>REGISTER</h2>

        {{-- Mensajes de error --}}
        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Mensaje de éxito --}}
        @if (Session::has('success'))
            <div class="success-box">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="name" placeholder="Nombre Completo" required>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="shield-checkmark"></ion-icon></span>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
        </div>

        <button type="submit">Crear Cuenta</button>

        <div class="login-link">
            <p>¿Ya tienes una cuenta? <a href="/login">Iniciar sesión</a></p>
        </div>
    </form>
</div>

{{-- Ionicons --}}
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #1a1a1a;
    }

    .wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 400px;
        background: transparent;
        border: 5px solid #333;
        border-radius: 10px;
        padding: 40px 35px 35px;
        transition: .5s;
    }

    .wrapper:hover {
        border: 5px solid #ff6a00;
        box-shadow: 0 0 20px #ff6a00, inset 0 0 20px #ff6a00;
    }

    h2 {
        font-size: 2em;
        text-align: center;
        color: #fff;
        transition: .5s;
        margin-bottom: 10px;
    }

    .wrapper:hover h2 {
        color: #ff6a00;
        animation: flicker-broken 2.2s infinite;
    }

    /* Mensajes */
    .error-box {
        background: rgba(255, 50, 50, 0.15);
        border: 1px solid rgba(255, 50, 50, 0.5);
        border-radius: 5px;
        padding: 10px 14px;
        margin-bottom: 10px;
    }

    .error-box p {
        color: #ff6b6b;
        font-size: .85em;
        margin: 0;
    }

    .success-box {
        background: rgba(255, 106, 0, 0.1);
        border: 1px solid rgba(255, 106, 0, 0.4);
        border-radius: 5px;
        padding: 10px 14px;
        margin-bottom: 10px;
    }

    .success-box p {
        color: #ff6a00;
        font-size: .85em;
        margin: 0;
    }

    .input-box {
        position: relative;
        width: 100%;
        margin: 20px 0;
    }

    .input-box input {
        width: 100%;
        height: 50px;
        background: transparent;
        border: 2px solid #333;
        outline: none;
        border-radius: 5px;
        font-size: 1em;
        color: #fff;
        padding: 0 10px 0 38px;
        transition: .5s;
    }

    .wrapper:hover .input-box input {
        border: 2px solid #ff6a00;
        box-shadow: 0 0 10px #ff6a00, inset 0 0 10px #ff6a00;
    }

    .input-box input::placeholder {
        color: rgba(255, 255, 255, 0.3);
    }

    .input-box .icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.2em;
        opacity: 0.4;
        color: #fff;
        transition: .5s;
        display: flex;
        align-items: center;
    }

    /* Iconos encienden uno a uno con delay */
    .wrapper:hover .input-box:nth-child(3) .icon {
        animation: power-on 0.8s ease forwards;
        animation-delay: 0s;
    }
    .wrapper:hover .input-box:nth-child(4) .icon {
        animation: power-on 0.8s ease forwards;
        animation-delay: 0.4s;
    }
    .wrapper:hover .input-box:nth-child(5) .icon {
        animation: power-on 0.8s ease forwards;
        animation-delay: 0.8s;
    }
    .wrapper:hover .input-box:nth-child(6) .icon {
        animation: power-on 0.8s ease forwards;
        animation-delay: 1.2s;
    }

    /* Boton submit */
    button[type="submit"] {
        position: relative;
        width: 100%;
        height: 45px;
        background: #333;
        border: none;
        outline: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        color: #fff;
        font-weight: 500;
        transition: .5s;
        margin-top: 5px;
    }

    .wrapper:hover button[type="submit"] {
        background: #ff6a00;
        color: #000;
        box-shadow: 0 0 20px #ff6a00;
    }

    .login-link {
        font-size: .9em;
        text-align: center;
        margin: 20px 0 0;
    }

    .login-link p {
        color: #fff;
    }

    .login-link p a {
        color: #333;
        text-decoration: none;
        font-weight: 600;
        transition: .5s;
    }

    .wrapper:hover .login-link p a {
        color: #ff6a00;
    }

    .login-link p a:hover {
        text-decoration: underline;
    }

    /* Animaciones extras */
    @keyframes flicker-broken {
        0%   { opacity: 1; text-shadow: 0 0 3px #ff6a00, 0 0 6px #ff6a00, 0 0 12px #ff6a00; }
        5%   { opacity: 0.4; text-shadow: none; }
        10%  { opacity: 1; }
        15%  { opacity: 0.2; text-shadow: none; }
        20%  { opacity: 1; }
        30%  { opacity: 0.7; }
        40%  { opacity: 1; }
        45%  { opacity: 0.3; text-shadow: none; }
        55%  { opacity: 1; }
        70%  { opacity: 0.5; }
        85%  { opacity: 1; }
        93%  { opacity: 0.2; text-shadow: none; }
        100% { opacity: 1; text-shadow: 0 0 4px #ff6a00, 0 0 10px #ff6a00, 0 0 20px #ff6a00, 0 0 40px #ff6a00; }
    }

    @keyframes power-on {
        0%   { opacity: 0.2; text-shadow: none; transform: translateY(-50%) scale(0.9); }
        50%  { opacity: 0.6; text-shadow: 0 0 5px #ff6a00; }
        100% { opacity: 1; text-shadow: 0 0 5px #ff6a00, 0 0 10px #ff6a00, 0 0 20px #ff6a00; transform: translateY(-50%) scale(1); }
    }
</style>

@endsection
