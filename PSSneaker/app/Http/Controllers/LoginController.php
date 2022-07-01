<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{
    // 
    public function index()
    {
        return view('login.index');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Không Được Bỏ Trống',
                'password.required' => 'Mật Khẩu Không Được Bỏ Trống',
                'email.email' => 'Email Không Đúng Định Dạng',
            ]
        );
        if (Auth::attempt($credentials) && Auth::user()->permission == 1  && Auth::user()->deleted_at == null) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/account');
        }
       else if (Auth::attempt($credentials) && Auth::user()->permission == 0  && Auth::user()->deleted_at == null) {
            $request->session()->regenerate();
            return redirect()->intended('index');
        }
        return back()->withErrors([
            'password' => 'Tài khoản hoặc mật khẩu sai',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect('dangnhap');
    }
    public function showFormRegister()
    {
        return view('login.register');
    }
    public function Register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->permission = '0';
        $user->save();
        return redirect()->route('dangnhapweb')->with('Đăng kí thành công');
    }
    public function email()
    {
        $name = 'for email';
        Mail::send('login.verify-email', compact('name'), function ($email) use ($name) {
            $email->subject('Demo test');
            $email->to('minhsanh.doanlaravel0709@gmail.com', $name);
        });
    }
    public function Quenmatkhau(){
        return view('login.forgetpassword');
    }
}
