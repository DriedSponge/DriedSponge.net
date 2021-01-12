<?php

namespace App\Http\Controllers\Auth;

use App\Models\SocialAccounts;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class DiscordLoginController extends Auth
{
    public function auth(Request $request)
    {
        $socialresponse = Socialite::driver('discord')->user();
        $socialaccount = SocialAccounts::where('provider', 'discord')->where('provider_id', $socialresponse->user['id'])->first();
        if (!$socialaccount) {
            $socialaccount = new SocialAccounts();
            $socialaccount->provider = "discord";
        }

        $socialaccount->updateInfo($socialresponse);

        if (!$socialaccount->user) {
            $user = User::where('email',$socialresponse->email)->first();
            if($user){
                return redirect()->route('spa',['home'])->with('error',
                    'There is an account that already exist with that email. Log into that account using github, and link your discord in order to login using discord.');
            }else{
                $user = User::create([
                    'username' => $socialresponse->user['username'],
                    'email' => $socialresponse->email,
                    'avatar' => $socialresponse->avatar
                ]);
                $user->assignRole('User');
                $user->social_accounts()->save($socialaccount);
                $socialaccount = SocialAccounts::where('provider', 'discord')->where('provider_id', $socialresponse->user['id'])->first();
            }

        }
        $user = $socialaccount->user;
        $connections = Http::withToken($socialresponse->token)->get('https://discord.com/api/users/@me/connections')->object();
        Auth::login($socialaccount->user);
        return response()->redirectTo("/");
    }
}
