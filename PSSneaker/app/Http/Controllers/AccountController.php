<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class AccountController extends Controller
{
    protected function fixImage(User $user)
    {
        if (Storage::disk('public')->exists($user->avatar)) {
            $user->avatar = Storage::url($user->avatar);
        } else {
            $user->avatar = '/Images/NoImage.jpg';
        }
    }
    public function index()
    {
        $lstuser = User::all();
        foreach ($lstuser as $user) {
            $this->fixImage($user);
        }
        return view('admin.account.index', ['lstuser' => $lstuser]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('login.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required',
                'phone' => 'required',
                'address'=>'required',

            ],
            [
                'name.required' => 'Họ Tên Không Được Bỏ Trống',
                'email.required' => 'Email Không Được Bỏ Trống',
                'email.email' => 'Email Không Đúng Định Dạng',
                'email.unique' => 'Email Đã Tồn Tại',
                'password.required' => 'Mật Khẩu Không Được Bỏ Trống',
                'phone.required' => 'Số Điện Thoại Không Được Bỏ Trống',
                'address.required' => 'Địa chỉ Không Được Bỏ Trống',
            ]
        );

        $user = new User;
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address'=>$request->input('address'),
        ]);
        $user->save();
        return Redirect::route('account.index', ['user' => $user]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
