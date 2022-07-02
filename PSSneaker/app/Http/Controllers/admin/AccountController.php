<?php

namespace App\Http\Controllers\admin;

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
    public function index(Request $request)
    {
        $lstuser = User::paginate(10);
        foreach ($lstuser as $user) {
            $this->fixImage($user);
        }
        if ($request->ajax()) {
            return view('admin.account.pagination_data', ['lstuser' => $lstuser]);
        }
        return view('admin.account.index', ['lstuser' => $lstuser]);
    }
    public function search(Request $request)
    {
        $lstuser = User::where('name', 'LIKE', '%' . $request->keyword . '%')->orWhere('email', 'LIKE', '%' . $request->keyword . '%')->orWhere('phone', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10);
        foreach ($lstuser as $user) {
            $this->fixImage($user);
        }
        if ($request->ajax()) {
            if ($lstuser->count() >= 1) {
                return view('admin.account.pagination_data', ['lstuser' => $lstuser]);
            } else {
                return response()->json([
                    'status' => 'Không có dữ liệu',
                ]);
            }
        }
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
                'address' => 'required',

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
            'address' => $request->input('address'),
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
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = $request->input('updateting_id');
        $user = User::findOrFail($user_id);
        $user->block = $request->has('block') ? '1' : '0';
        $user->save();
        return Redirect::route('account.index');
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
