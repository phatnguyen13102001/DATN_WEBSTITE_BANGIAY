<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class FacebookController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
      $getInfo = Socialite::driver($provider)->user(); 
      $user = $this->createUser($getInfo,$provider); 
      auth()->login($user); 
      return redirect('index');
    }
    function createUser($getInfo,$provider){
    $user = User::where('facebook_id', $getInfo->id)->first();
    if (!$user) {
         $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'facebook_id' => $getInfo->id
        ]);
      }
      return $user;
    }
}
