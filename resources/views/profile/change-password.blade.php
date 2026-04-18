@extends('layouts.app-master')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <h2>Cambiar Contraseña</h2>

            @include('layouts.partials.messages')

            <form action="/change-password" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Contraseña actual</label>
                    <input type="password" name="current_password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar nueva contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
                <a href="/home" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection