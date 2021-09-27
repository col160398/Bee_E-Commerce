<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialAccount;
use App\Models\User;

class APiSocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect(); 
    }
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        if(!$user->token){
            //return json
            dd('failed');
        }
        $appUser = User::whereEmail($user->email)->first();

        if(!$appUser){
            //tao nguoi dung va them provider
            $appUser = User::create([

            ]);
        }else{
            $socialAccount = $appUser->socialAccounts()->where('provider',$provider)->first();
            if(!$socialAccount){
                //tao social account
                $socialAccount = SocialAccount::create([
                    'provider'=>$provider,
                    'provider_user_id'=> $user->id,
                    'user_id'=>$appUser->id
                ]);
            }
            

        }
        dd($user->token, $appUser); 
    }
    // public function sendPasswordResetNotification($token){
    //     $this->notify(new sendPasswordResetNotification($token));
    // }
    
}
