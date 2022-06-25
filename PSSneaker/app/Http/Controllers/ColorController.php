<?php

namespace App\Http\Controllers;
use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstcolor = color::all();
        return view('admin.color.index', [
            'lstcolor' =>$lstcolor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstcolor = color::all();
        return view('admin.color.add', [
            'lstcolor' => $lstcolor
        ]);
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
                'code'=> 'required',
            ],
            [
                'name.required' => 'Tên Màu Không Được Bỏ Trống',
                'code.required' => 'Mã Màu Không Được Bỏ Trống',
            ]
        );
        $color = new color;
        $color->fill([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);
        $color->save();
        return Redirect::route('color.index', ['color' => $color]);
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
    public function edit(color $color)
    {
        return view(
            'admin.color.edit',
            ['color' => $color,]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, color $color)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'code'=> 'required',
            ],
            [
                'name.required' => 'Tên Màu Không Được Bỏ Trống',
                'code.required' => 'Mã Màu Không Được Bỏ Trống',
            ]
        );
        $color->fill([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);
        $color->save();
        return Redirect::route('color.index', ['color' => $color]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        $color->delete();
        return Redirect::route('color.index');
    }
}
