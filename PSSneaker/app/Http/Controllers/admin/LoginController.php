<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Logo;
use App\Models\Policies;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    protected function fixImagelogo($logo)
    {
        if (Storage::disk('public')->exists($logo->image)) {
            $logo->image = Storage::url($logo->image);
        } else {
            $logo->image = '/admin_pssneaker/images/noimage.png';
        }
    }
    protected function fixImage(User $user)
    {
        if (Storage::disk('public')->exists($user->avatar)) {
            $user->avatar = Storage::url($user->avatar);
        } else {
            $user->avatar = '/Images/NoImage.jpg';
        }
    }
    // 
    public function index()
    {
        $mangxh=Social::all();
        $lstlogo = Logo::first();
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        foreach ($lstsetting as $setting) {
        }
        $this->fixImagelogo($lstlogo);
        return View::make('login.index', compact('mangxh','setting', 'lstlogo', 'hangsx', 'chinhsach'))->nest('user.layoutuser.footer', 'login.index', compact('mangxh','setting', 'lstlogo', 'hangsx', 'chinhsach'));
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
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('dangnhap');
    }
    public function showFormRegister()
    {
        $lstlogo = Logo::first();
        $chinhsach = Policies::all();
        $hangsx = Manufacturer::all();
        $lstsetting = Setting::all();
        foreach ($lstsetting as $setting) {
        }
        $this->fixImagelogo($lstlogo);
        return View::make('login.register', compact('setting', 'hangsx', 'lstlogo', 'chinhsach'))->nest('user.layoutuser.footer', 'login.register', compact('setting', 'lstlogo', 'hangsx', 'chinhsach'));
    }
    public function Register(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|email|unique:colors,name,NULL,id,deleted_at,NULL',
                'name' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'birthday' => 'required',
            ],
            [
                'email.required' => 'Email Không Được Bỏ Trống',
                'email.unique' => 'Email Đã Được Sử Dụng',
                'email.email' => 'Email Không Đúng Định Dạng',
                'name.required' => 'Tên Không Được Bỏ Trống',
                'phone.required' => 'Số điện thoại Không Được Bỏ Trống',
                'gender.required' => 'Giới tính Không Được Bỏ Trống',
                'birthday.required' => 'Ngày sinh Không Được Bỏ Trống',
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->avatar = '';
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->permission = '0';

        $user->save();
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('images/user/', 'public');
        }
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
    public function editprofile()
    {
        return view('user.account.index')->with('user', auth()->user());
    }
    public function Updateprofile(Request $request, User $user)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'birthday' => 'required',
            ],
            [
                'name.required' => 'Tên Không Được Bỏ Trống',
                'phone.required' => 'Số điện thoại Không Được Bỏ Trống',
                'birthday.required' => 'Ngày sinh Không Được Bỏ Trống',
            ]
        );
        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->name = $request['name'];
            $user->phone = $request['phone'];
            $user->birthday = $request['birthday'];
            $user->address = $request['address'];
            $user->save();
            $request->session()->flash('success', 'cập nhật thành công');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
