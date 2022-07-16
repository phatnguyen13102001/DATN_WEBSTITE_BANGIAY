<?php

namespace App\Http\Controllers\admin;

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
    public function index(Request $request)
    {
        $color = color::paginate(10);
        if ($request->ajax()) {
            return view('admin.color.pagination_data', ['lstcolor' => $color]);
        }
        return view('admin.color.index', ['lstcolor' => $color]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $lstcolor = color::where('name', 'LIKE', '%' . $request->keyword . '%')->orwhere('code', 'LIKE', '%' . $request->keyword . '%')
                ->paginate(10);
            if ($lstcolor->count() >= 1) {
                return view('admin.color.pagination_data', ['lstcolor' => $lstcolor]);
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
                'name' => 'required|unique:colors,name,NULL,id,deleted_at,NULL',
                'code' => 'required|unique:colors,code,NULL,id,deleted_at,NULL|max:7',
            ],
            [
                'name.required' => 'Tên màu không được bỏ trống',
                'name.unique' => 'Tên màu không được trùng',
                'code.required' => 'Mã màu không được bỏ trống',
                'code.unique' => 'Mã màu không được trùng',
                'code.max' => 'Mã màu không vượt quá 7 ký tự',
            ]
        );
        $color = new color;
        $color->fill([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);
        $color->save();
        return Redirect::route('color.index');
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
                'name' => 'required|unique:colors,name,' . $color->id . ',id,deleted_at,NULL',
                'code' => 'required|max:7|unique:colors,code,' . $color->id . ',id,deleted_at,NULL',
            ],
            [
                'name.required' => 'Tên màu không được bỏ trống',
                'name.unique' => 'Tên màu không được trùng',
                'code.unique' => 'Mã màu không được trùng',
                'code.required' => 'Mã màu không được bỏ trống',
                'code.max' => 'Mã màu không vượt quá 7 ký tự',
            ]
        );
        $color->fill([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);
        $color->save();
        return Redirect::route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $color_id = $request->input('deleteting_id');
        $color = color::find($color_id);
        $color->delete();
        return Redirect::route('color.index');
    }
}
