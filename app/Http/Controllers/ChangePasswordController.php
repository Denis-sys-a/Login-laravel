<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    // Muestra el formulario
    public function show(){
        return view('profile.change-password');
    }

    // Procesa el cambio
    public function update(ChangePasswordRequest $request){
        $user = Auth::user();

        // Verifica que la contraseña actual sea correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'La contraseña actual no es correcta.'
            ]);
        }

        // Actualiza la contraseña
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente.');
    }
}
