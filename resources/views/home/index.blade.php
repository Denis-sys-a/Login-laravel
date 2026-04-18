@extends('layouts.app-master')

@section('content')
    <div class="mt-5">
        <h1 class="display-4 fw-bold typewriter">¡Hola! </h1>
        <p class="lead mt-3 fade-in">Bienvenido <strong>{{ auth()->user()->name }}</strong> bro, estas autenticado a la pagina :)</p>
    </div>

    <style>
        .typewriter {
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid #fff;
            width: 0;
            animation:
                typing 1.5s steps(8, end) forwards,
                blink 0.7s step-end infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to   { width: 6ch; }
        }

        @keyframes blink {
            0%, 100% { border-color: #fff; }
            50%       { border-color: transparent; }
        }

        /* El texto de bienvenida aparece lentamente*/
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
            animation-delay: 1.6s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection
