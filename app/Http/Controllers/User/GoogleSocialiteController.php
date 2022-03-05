<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Exception;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use Laravel\Socialite\Facades\Socialite;


class GoogleSocialiteController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = $this->user->findData(['social_id' => $user->id]);
            if ($finduser) {
                Auth::login($finduser);
                return ResponseHelper::select($user);
            }else {
                    $newUser = User::create([
                        'username' => $user->name,
                        'social_id' => $user->id,
                        'social_type' => 'google',
                    ]);
                    Auth::login($newUser);
                    return ResponseHelper::create($newUser);
                }
            }
        catch
            (Exception $e) {
                dd($e->getMessage());
            }
    }
}
