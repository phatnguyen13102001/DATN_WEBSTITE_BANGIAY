<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
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
                'email' => 'required|email|unique:colors,name,NULL,id,deleted_at,NULL',
                'name' => 'required',
                'phone' => 'required|min:10|max:11|numeric',
                'gender' => 'required',
                'birthday' => 'required',
            ],
            [
                'email.required' => 'Email Không Được Bỏ Trống',
                'email.unique' => 'Email Đã Được Sử Dụng',
                'email.email' => 'Email Không Đúng Định Dạng',
                'name.required' => 'Tên Không Được Bỏ Trống',
                'phone.required' => 'Số điện thoại Không Được Bỏ Trống',
                'phone.min' => 'Số điện thoại ít nhất 10 số',
                'phone.max' => 'Số điện thoại nhiều nhất 11 số',
                'phone.numeric' => 'Số điện thoại phải là số',
                'gender.required' => 'Giới tính Không Được Bỏ Trống',
                'birthday.required' => 'Ngày sinh Không Được Bỏ Trống',
            ]
        );

        $user = new User;
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'birthday' => $request->input('birthday'),
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
    // đổi mật khẩu admin
    public function changepasswordadmin(){
        return view('admin.changepassword.index');
    }
    public function updatepasswordadmin(Request $request){
        $request ->validate([
            'password'=> 'required|min:8',
            'new_password'=>'required|min:8',
        ],
        [
            'password.required'=>'Mật  khẩu cũ không được bỏ trống',
            'password.min'=>'Mật khẩu nhập ít nhất 8 kí tự',
            'new_password.required'=>'Mật  khẩu mới không được bỏ trống',
            'new_password.min'=>'Mật khẩu nhập ít nhất 8 kí tự',
        ]
    );
        $user = auth()->user();
        if(Hash::check($request->password, $user->password)){
            $user ->update([
                'password'=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success','Cập nhật thành công');
        }else{
            return redirect()->back()->with('error','Mật khẩu cũ không khớp');
        }
    }
}
