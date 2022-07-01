<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
class GoogleController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()      // this function direct go to google
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()  // this function get user login of googlre
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('provider_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('index');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone'=>'',
                    'address'=>'', 
                    'provider_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
                return redirect('index');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}