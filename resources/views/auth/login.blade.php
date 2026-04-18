@extends('layouts.auth-master')

@section('content')

<div class="wrapper">
    <form action="/login" method="POST">
        @csrf

        <h2>LOGIN</h2>

        {{-- Mensajes de error --}}
        @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Mensajes de éxito --}}
        @if (Session::has('success'))
            <div class="success-box">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="username" placeholder="Nombre / Email" required>
        </div>

        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <div class="forgot-pass">
            <a href="#">¿Has olvidado tu contraseña?</a>
        </div>

        <button type="submit">Acceder</button>

        {{-- El boton de google --}}
        <a href="/auth/google" class="btn-google">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                <path fill="none" d="M0 0h48v48H0z"/>
            </svg>
            Iniciar sesión con Google
        </a>

        <div class="register-link">
            <p>¿No tienes una cuenta? <a href="/register">Registrar</a></p>
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
        border: 5px solid #0ef;
        box-shadow: 0 0 20px #0ef, inset 0 0 20px #0ef;
    }

    h2 {
        font-size: 2em;
        text-align: center;
        color: #fff;
        transition: .5s;
        margin-bottom: 10px;
    }

    .wrapper:hover h2 {
        color: #0ef;
        animation: flicker-broken 2.2s infinite;
    }

    /* Mensajes de error */
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
        background: rgba(0, 238, 255, 0.1);
        border: 1px solid rgba(0, 238, 255, 0.4);
        border-radius: 5px;
        padding: 10px 14px;
        margin-bottom: 10px;
    }

    .success-box p {
        color: #0ef;
        font-size: .85em;
        margin: 0;
    }

    .input-box {
        position: relative;
        width: 100%;
        margin: 25px 0;
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
        border: 2px solid #0ef;
        box-shadow: 0 0 10px #0ef, inset 0 0 10px #0ef;
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

    .wrapper:hover .input-box:nth-child(3) .icon {
        animation: power-on 0.8s ease forwards;
    }

    .wrapper:hover .input-box:nth-child(4) .icon {
        animation: power-on 0.8s ease forwards;
        animation-delay: 0.6s;
    }

    .forgot-pass {
        margin: -15px 0 15px;
    }

    .forgot-pass a {
        color: #fff;
        font-size: .85em;
        text-decoration: none;
        transition: .5s;
    }

    .wrapper:hover .forgot-pass a {
        color: #0ef;
    }

    .forgot-pass a:hover {
        text-decoration: underline;
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
    }

    .wrapper:hover button[type="submit"] {
        background: #0ef;
        color: #000;
        box-shadow: 0 0 20px #0ef;
    }

    /* Boton Google */
    .btn-google {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        height: 45px;
        margin-top: 12px;
        background: transparent;
        border: 2px solid #333;
        border-radius: 5px;
        color: #fff;
        font-size: .95em;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: .5s;
    }

    .wrapper:hover .btn-google {
        border-color: #0ef;
        box-shadow: 0 0 10px #0ef;
        color: #0ef;
    }

    .btn-google:hover {
        background: rgba(0, 238, 255, 0.1);
    }

    .register-link {
        font-size: .9em;
        text-align: center;
        margin: 20px 0 0;
    }

    .register-link p {
        color: #fff;
    }

    .register-link p a {
        color: #333;
        text-decoration: none;
        font-weight: 600;
        transition: .5s;
    }

    .wrapper:hover .register-link p a {
        color: #0ef;
    }

    .register-link p a:hover {
        text-decoration: underline;
    }

    /* Animaciones extras */
    @keyframes flicker-broken {
        0%   { opacity: 1; text-shadow: 0 0 3px #0ef, 0 0 6px #0ef, 0 0 12px #0ef; }
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
        100% { opacity: 1; text-shadow: 0 0 4px #0ef, 0 0 10px #0ef, 0 0 20px #0ef, 0 0 40px #0ef; }
    }

    @keyframes power-on {
        0%   { opacity: 0.2; text-shadow: none; transform: translateY(-50%) scale(0.9); }
        50%  { opacity: 0.6; text-shadow: 0 0 5px #0ef; }
        100% { opacity: 1; text-shadow: 0 0 5px #0ef, 0 0 10px #0ef, 0 0 20px #0ef; transform: translateY(-50%) scale(1); }
    }
</style>

@endsection
