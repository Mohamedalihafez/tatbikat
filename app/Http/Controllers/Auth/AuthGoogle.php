<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthGoogle extends Controller
{
    //

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->route("index");
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => now(),
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => Hash::make("my-google"),
                ]);
     
                Auth::login($newUser);
                return redirect()->route("dashboard");
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}