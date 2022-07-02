<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    protected function fixImage(User $user)
    {
        if (Storage::disk('public')->exists($user->avatar)) {
            $user->avatar = Storage::url($user->avatar);
        } else {
            $user->avatar = '/Images/NoImage.jpg';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstuser = User::where('permission', '1')->get();
        foreach ($lstuser as $user) {
            $this->fixImage($user);
        }
        return view('admin.inforadmin.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
            ],
            [
                'name.required' => 'Tên Không Được Bỏ Trống',
                'phone.required' => 'Số Điện Thoại Sản Xuất Không Được Bỏ Trống',
                'email.required' => 'Email Sản Xuất Không Được Bỏ Trống',
            ]
        );
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->gender = $request->get('gender');
        $user->birthday = date('Y-m-d H:i:s', strtotime($request->input('birthday')));
        if (request()->hasFile('avatar')) {
            $imagePath = public_path('storage/' . $user->avatar);
            if (File::exists($imagePath)) {
                if ($imagePath == (public_path('storage/'))) {
                    $image = request()->file('avatar')->store('images/user/', 'public');
                    $user->avatar = $image;
                    $user->save();
                } else {
                    unlink($imagePath);
                }
            }
            $image = request()->file('avatar')->store('images/user/', 'public');
            $user->avatar = $image;
            $user->save();
        }
        $user->save();
        return Redirect::route('information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
