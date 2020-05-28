<?php

namespace App\Http\Controllers;

use App\SocialUser;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class SocialUserController extends Controller
{
    public function vkauth()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    public function vkauth_callback()
    {
        $oauth = Socialite::driver("vkontakte")->user();
        $user = $this->findUserBySocID($oauth->getId());

        if (is_null($user)) {
            $user = User::create([
                'name' => $oauth->getName(),
                'email' => $oauth->getEmail(),
                'password' => md5(time()),
            ]);

            $soc_user = SocialUser::create([
                'soc_id' => $oauth->getId(),
                'user_id' => $user->id,
            ]);
        }

        auth()->login($user, true);

        return redirect()->route('main');
    }

    public function findUserBySocID($soc_id)
    {
        $soc_user = SocialUser::where('soc_id', $soc_id)->first();

        if ( ! is_null($soc_user)) {
            return User::where('id', $soc_user->user_id)->first();
        }

        return null;
    }
}
