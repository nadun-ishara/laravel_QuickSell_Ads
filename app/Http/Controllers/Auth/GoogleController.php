<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\OauthIdentity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirect(){
        return socialite::driver('google')->redirect();
    }

    public function callback(){
        $googleUser = Socialite::driver('google')->stateless()->user(); //get user data from google

        $identity = OauthIdentity::where('provider_name', 'google')  //check linked?
        ->where('provider_id', $googleUser->getId())
        ->first();

        if ($identity){
            Auth::login($identity->user);
            return redirect('/');
        }
        elseif($identity){
            $identity->delete();
        }

        $user = User::where('email', $googleUser->email)->first();  //check email exist

        if(!$user){
            $user =User::create([      //create new user
                'name' => $googleUser->name,
                'email'=>$googleUser->email,
                'password'=>bcrypt(\Illuminate\Support\Str::random(24)),
                'role_id'=>3,
                'status'=>'active',
            ]);
        }

        OauthIdentity::create([     //save OAuth
            'user_id'=> $user->id,
            'provider_name'=>'google',
            'provider_id'=> $googleUser->getId(),
            'access_token'=> $googleUser->token,
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
