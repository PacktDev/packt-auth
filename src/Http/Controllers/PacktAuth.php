<?php

namespace Packt\PacktAuth\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class PacktAuth extends Controller
{

    /**
     * @var
     */
    protected $userModel;

    public function __construct(){
        $this->userModel = app()->make('config')->get('auth.providers.users.model');
    }

    public function redirectToAzure(){
        return Socialite::driver('azure')->redirect();
    }

    public function handleAzureResponse(){

        $userInfo = Socialite::driver('azure')->user();

        $user = $this->handleAzure('azure', $userInfo);

        auth()->login($user);

        return redirect()->intended((new $this->userModel)->getRedirect());

    }

    private function handleAzure($provider, $userInfo){

        $user =  $this->userModel::where('provider_id', $userInfo->id)->first();

        if(!$user){
            $user = $this->userModel::create([
                'name' => $userInfo->name,
                'email' => $userInfo->email,
                'provider' => $provider,
                'provider_id' => $userInfo->id
            ]);

        }

        $user->markEmailAsVerified();

        return $user;
    }

}
