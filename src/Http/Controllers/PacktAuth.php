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
        
        $id_token_payload = explode('.', $userInfo->accessTokenResponseBody['id_token'])[1];
        $id_token_payload = base64_decode($id_token_payload);
        $id_token_payload = json_decode($id_token_payload);

        if ( isset($id_token_payload->roles) ) {
            $user->roles = $id_token_payload->roles;
        }

        $user->markEmailAsVerified();

        return $user;
    }

}
