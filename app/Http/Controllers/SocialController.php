<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{
    // Redirige al usuario a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google nos devuelve al usuario con su info
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Busca si ya existe ese usuario por su google ID
        $user = User::where('provider_id', $googleUser->getId())->first();

        if (!$user) {
            // Si no existe, lo crea
            $user = User::create([
                'name'        => $googleUser->getName(),
                'email'       => $googleUser->getEmail(),
                'provider'    => 'google',
                'provider_id' => $googleUser->getId(),
                'password'    => null,
            ]);
        }

        Auth::login($user);

        return redirect('/home');
    }
}
