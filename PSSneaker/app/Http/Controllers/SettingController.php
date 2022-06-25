<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstSetting = Setting::all();
        foreach ($lstSetting as $setting) {
        }
        return view('admin.settingweb.index', [
            'setting' => $setting
        ]);
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validatedData = $request->validate(
            [
                'address' => 'required',
                'phone' => 'required',
                'hotline' => 'required',
                'email' => 'required',
                'slogan' => 'required',
            ],
            [
                'address.required' => 'Địa Chỉ Không Được Bỏ Trống',
                'phone.required' => 'Số Điện Thoại Sản Xuất Không Được Bỏ Trống',
                'hotline.required' => 'Hotline Sản Xuất Không Được Bỏ Trống',
                'email.required' => 'Email Sản Xuất Không Được Bỏ Trống',
                'slogan.required' => 'Slogan Hãng Sản Xuất Không Được Bỏ Trống',
            ]
        );

        $setting->fill([
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'hotline' => $request->input('hotline'),
            'email' => $request->input('email'),
            'slogan' => $request->input('slogan'),
            'iframeggmap' => $request->input('coords_iframe'),
            'zalo' => $request->input('zalo'),
            'fanpage' => $request->input('fanpage'),
        ]);
        $setting->save();
        return Redirect::route('setting.index', ['setting' => $setting]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
