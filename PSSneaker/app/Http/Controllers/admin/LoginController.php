<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use App\Models\Policies;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    // 
    public function index()
    {
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        foreach ($lstsetting as $setting) {
        }
        return View::make('login.index', compact('setting', 'hangsx', 'chinhsach'))->nest('user.layoutuser.footer', 'login.index', compact('setting', 'hangsx', 'chinhsach'));
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
            return redirect()->intended('/admin');
        } else if (Auth::attempt($credentials) && Auth::user()->permission == 0  && Auth::user()->deleted_at == null && Auth::user()->block == 0) {
            $request->session()->regenerate();
            return redirect()->intended('index')->with('success', 'Đăng nhập thành công');
        } else if (Auth::attempt($credentials) && Auth::user()->block == 1  && Auth::user()->deleted_at == null) {
            return back()->withErrors([
                'password' => 'Tài khoản của bạn đã bị khóa',
            ]);
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
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        foreach ($lstsetting as $setting) {
        }
        return View::make('login.register', compact('setting', 'hangsx', 'chinhsach'))->nest('user.layoutuser.footer', 'login.register', compact('setting', 'hangsx', 'chinhsach'));
    }
    public function Register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|email|unique:colors,name,NULL,id,deleted_at,NULL',
                'name' => 'required',
            ],
            [
                'email.required' => 'Email Không Được Bỏ Trống',
                'email.unique' => 'Email Đã Được Sử Dụng',
                'email.email' => 'Email Không Đúng Định Dạng',
                'name.required' => 'Tên Không Được Bỏ Trống',

            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->permission = '0';
        $user->save();
        return redirect()->route('dangnhapweb', compact(['lstsetting', 'lstmanufacturer']))->with('Đăng kí thành công');
    }
    public function email()
    {
        $name = 'for email';
        Mail::send('login.verify-email', compact('name'), function ($email) use ($name) {
            $email->subject('Demo test');
            $email->to('minhsanh.doanlaravel0709@gmail.com', $name);
        });
    }
    public function Quenmatkhau()
    {
        return view('login.forgetpassword');
    }
    public function getsecsion(Request $request, $req)
    {
        $r = User::where('email', '=', $req->email)->first();
        if ($r) {
            if (Hash::check($req->password, $r->password)) {
                $req->session()->put('User', $r);
                return redirect("show");
            } else {
                echo "password not exit";
            }
        } else {
            echo "email not exsỉt";
        }
    }
}
